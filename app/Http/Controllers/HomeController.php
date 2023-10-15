<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
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
    
}
