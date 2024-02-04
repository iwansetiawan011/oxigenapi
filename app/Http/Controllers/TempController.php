<?php

namespace App\Http\Controllers;

use App\Models\OrderTemp;
use Illuminate\Http\Request;

class TempController extends Controller
{
    public function index(Request $request)
    {
        $data = OrderTemp::with('product')->get();

        return view('layouts.main', compact('data'));
    }
}
