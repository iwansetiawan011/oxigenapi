<?php

namespace App\Http\Controllers;

use App\Models\OrderTemp;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function about()
    {
        $session = session()->getId();

        $temps = OrderTemp::join('products', 'order_temps.product_id', '=', 'products.id')
            ->select('order_temps.*', 'products.product_name', 'products.thumbnail', 'products.price', 'products.product_slug')->where('order_temps.user_unique', $session)->get();

        $count = $temps->count();

        return view('about', compact('temps', 'count'));
    }

    public function contact()
    {
        $session = session()->getId();

        $temps = OrderTemp::join('products', 'order_temps.product_id', '=', 'products.id')
            ->select('order_temps.*', 'products.product_name', 'products.thumbnail', 'products.price', 'products.product_slug')->where('order_temps.user_unique', $session)->get();

        $count = $temps->count();

        return view('contact', compact('temps', 'count'));
    }
}
