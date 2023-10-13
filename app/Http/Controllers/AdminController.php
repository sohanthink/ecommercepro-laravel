<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

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
    public function add_product(Request $request){

    // Generate a unique filename based on the current timestamp.
    $image = $request->file('image');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $imagePath = $image->storeAs('product_images', $imagename, 'public');

    $product = Products::create([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'discount_price' => $request->discount_price,
        'quantity' => $request->quantity,
        'category' => $request->category,
        'image' => 'product_images/' . $imagename, // Set the image path
    ]);

    return back()->with('message', 'Product Added Successfully');
    }


}
