<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    // category page view
    public function view_catagory(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    
    // category add
    public function add_category(Request $request){
        $data = new Category;
        $data ->category_name = $request->category;
        $data ->save();
        return back()->with('message','Category Added Successfully');
    }

    // category delete
    public function category_delete($id){
        $data = Category::findOrFail($id);
        $data -> delete();
        return back()->with('message',('Category Deleted Successfully'));
    }

    // product view
    public function view_product(){
        $categories = Category::all();
        return view('admin.product',compact('categories'));
    }

    // add product
    public function add_product(){
        $categories = Category::all();
        return view('admin.product',compact('categories'));
    }
}
