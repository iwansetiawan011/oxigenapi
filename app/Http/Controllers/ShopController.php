<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderTemp;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $data = Product::get();

        $categories = Category::get();

        $session = session()->getId();

        $temps = OrderTemp::join('products', 'order_temps.product_id', '=', 'products.id')
            ->select('order_temps.*', 'products.product_name', 'products.thumbnail', 'products.price', 'products.product_slug')->where('order_temps.user_unique', $session)->get();

        $count = $temps->count();

        return view('shop', compact('data', 'categories', 'temps', 'count'));
    }

    public function show(Product $product)
    {
        // $product = DB::table('products')
        //     ->where('product_slug', $product->slug)->first();

        // $gambar = ProductImage::where('product', $product->slug)->get();

        // $product = Product::with('category')
        //     ->where('category_id', $product->category_id)
        //     ->first();

        $product = Product::where('product_slug', $product->product_slug)->first();

        $images = Product::with('productImages')
            ->where('product_slug', $product->product_slug)
            ->first();

        $session = session()->getId();

        $temps = OrderTemp::join('products', 'order_temps.product_id', '=', 'products.id')
            ->select('order_temps.*', 'products.product_name', 'products.thumbnail', 'products.price', 'products.product_slug')->where('order_temps.user_unique', $session)->get();

        $count = $temps->count();

        return view('shop-detail', compact('product', 'images', 'temps', 'count'));
    }
}
