<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);
route::get('/view_catagory',[AdminController::class,'view_catagory'])->name('view_catagory');

// category added
route::post('/add_category',[AdminController::class,'add_category'])->name('add_category');

// category deleted
route::get('/category_delete/{id}',[AdminController::class,'category_delete'])->name('category_delete');

// product page view
route::get('/view_product',[AdminController::class,'view_product'])->name('view_product');

// product add
route::post('/add_product',[AdminController::class,'add_product'])->name('add_product');

// product show on the admin dashboard
route::get('/show_product',[AdminController::class,'show_product'])->name('show_product');

// Product delete from the product show page
route::get('/delete_product/{id}',[AdminController::class,'delete_product'])->name('delete_product');

// Product update from the product show page to update page
route::get('/update_product/{id}',[AdminController::class,'update_product'])->name('update_product');


// Product updated
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm'])->name('update_product_confirm');