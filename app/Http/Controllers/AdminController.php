<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;


class AdminController extends Controller
{
    // category page view ==========================================
    public function view_catagory(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    
    

    // category add ================================================
    public function add_category(Request $request){
        $data = new Category;
        $data ->category_name = $request->category;
        $data ->save();
        return back()->with('message','Category Added Successfully');
    }



    // category delete =============================================
    public function category_delete($id){
        $data = Category::findOrFail($id);
        $data -> delete();
        return back()->with('message',('Category Deleted Successfully'));
    }



    // product view =================================================
    public function view_product(){
        $categories = Category::all();
        return view('admin.product',compact('categories'));
    }



    // add product ===================================================
    public function add_product(Request $request){

    // Generate a unique filename based on the current timestamp.
    $image = $request->file('image');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $imagePath = $image->storeAs('/product_images', $imagename, 'public');
 
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



    // show product ===================================================
    public function show_product(){
        $products = Products::all();
        return view('admin.show_product',compact('products'));
    }



    // delete product ===================================================
    public function delete_product($id){
        $products = Products::all();
        $delete = Products::findOrFail($id);
        $delete -> delete();
        return back()->with('message','Product Deleted Successfully');
    }


     // update product ===================================================
     // go to update update page to update data
    public function update_product($id){
        $categories = Category::all();
        $update = Products::FindOrFail($id);
        return view('admin.update_product',compact('update','categories'));
    }


    // Update data from taking the updated data
    public function update_product_confirm(Request $request, $id){
        // Retrieve the specific product by ID
        $product = Products::findOrFail($id);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('product_images', $imagename, 'public');
            $product->image = 'product_images/' . $imagename;
        }

        // Update other product attributes
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        
        $product->save(); // Save the updated product

        return back()->with('message', 'Product Updated Successfully');
    }


    public function orders(){
        $orders = Order::all();
        return view('admin.orders',compact('orders'));
    }


}
