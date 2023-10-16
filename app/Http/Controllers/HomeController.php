<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Cart;
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
            return redirect('register ');
        }
        
    }
}
