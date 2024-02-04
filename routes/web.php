<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  return view('home');
});


Route::get('/about', [LandingController::class, 'about']);

Route::get('/contact', [LandingController::class, 'contact']);

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product:product_slug}', [ShopController::class, 'show']);


Route::get('/admin', function () {
  return view('admin.home-admin');
});

Route::resource('/admin/product', ProductController::class);
Route::get('/admin/product/edit/{product:product_slug}', [ProductController::class, 'edit']);
Route::get('/admin/product/detail/{product:product_slug}', [ProductController::class, 'show']);
Route::resource('/admin/category', CategoryController::class);
Route::resource('/admin/productImage', ProductImageController::class);

Route::post('temp_create', [OrderController::class, 'temp_create'])->name('temp_create');
Route::post('temp_update/{id}', [OrderController::class, 'temp_update'])->name('temp_update');
Route::delete('temp_destroy/{id}', [OrderController::class, 'temp_destroy'])->name('temp_destroy');
Route::get('/shop-checkout', [OrderController::class, 'checkout'])->name('shop-checkout');
Route::post('order_create', [OrderController::class, 'order_create'])->name('order_create');
Route::get('/shop-payment/{id}', [OrderController::class, 'payment'])->name('shop-payment');

Route::resource('/admin/menu-category', MenuCategoryController::class);
Route::resource('/admin/menu', MenuController::class);
