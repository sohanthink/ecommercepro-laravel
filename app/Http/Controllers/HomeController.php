<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{

    // functions to go to the main homepage===========================================
    public function index(){
        $products = Products::paginate(3);
        return view('home.userpage',compact('products'));
    }


    // User and admin management fro the site =========================================
    public function redirect(){
        $usertype = Auth::User()->usertype;

        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            $products = Products::paginate(3);
            return view('home.userpage',compact('products'));
        }
    }



    public function product_details($id){
        $product = Products::find($id);
        return view('home.product_details',compact('product'));
    }
    

    // cart add product from the website =========================================
    public function add_cart(Request $request, $id){
        // checking if there is any user login
        if(Auth::id()){
            $user = Auth::user();
            $product = Products::find($id);
            $cart = new Cart;

            // checking if the product have any discount
            if($product->discount_price != null ){
                $cart->price = $product->discount_price * $request->quantity;
                
            }
            else{
                $cart->price = $product->price * $request->quantity;
            }

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->quantity = $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;
            $cart ->save();
            return back();
            
        }
        // if there is no user login then send him to register/login
        else{
            return redirect('register');
        }
    }


     // show cart with product added
     public function show_cart(){
        // if is checking that is there any user is logged in or not?
        if(Auth::id()){
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', $id)->get();
            return view('home.show_cart',compact('cart'));
        }
        else{
            return redirect('register');
        }
        
    }


    // remove a cart item from the cart page
    public function remove_cart_item($id){
        $item = Cart::find($id)->delete();
        return back()->with('message','Cart Item Deleted Successfully');
    }


    // process cash on delivery button
    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;
        $cartdata = Cart::where('user_id',$userid)->get();
        
        foreach($cartdata as $cartdata){
            $order = new Order;
            $order->name = $cartdata->name;
            $order->email = $cartdata->email;
            $order->phone = $cartdata->phone;
            $order->address = $cartdata->address;
            $order->user_id = $cartdata->user_id;

            $order->product_title = $cartdata->product_title;
            $order->quantity = $cartdata->quantity;
            $order->price = $cartdata->price;
            $order->image = $cartdata->image;
            $order->product_id = $cartdata->product_id;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order -> save();

            $cartid = $cartdata->id;
            $cart = Cart::findOrFail($cartid);
            $cart -> delete();
            
        }
        return back()->with('message','Order Placed Successfully, We will Contact with You Soon');
    }


    // payment with stripe
    public function stripe($total_price)
    {
        return view('stripe',compact('total_price'));
    }

    public function stripePost(Request $request, $total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total_price*100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "Payment for e-com site",
        ]);
   
        Session::flash('success', 'Payment Successfull!');
        
        // after payment, i moved the cart data to order table
        $user = Auth::user();
        $userid = $user->id;
        $cartdata = Cart::where('user_id',$userid)->get();
        foreach($cartdata as $cartdata){
            $order = new Order;
            $order->name = $cartdata->name;
            $order->email = $cartdata->email;
            $order->phone = $cartdata->phone;
            $order->address = $cartdata->address;
            $order->user_id = $cartdata->user_id;

            $order->product_title = $cartdata->product_title;
            $order->quantity = $cartdata->quantity;
            $order->price = $cartdata->price;
            $order->image = $cartdata->image;
            $order->product_id = $cartdata->product_id;

            $order->payment_status = 'card payment';
            $order->delivery_status = 'paid';
            $order -> save();

            $cartid = $cartdata->id;
            $cart = Cart::findOrFail($cartid);
            $cart -> delete();
        }

        return back();
    }



}
