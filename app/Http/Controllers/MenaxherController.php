<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MenaxherController extends Controller
{
    public function home(){
        $product = Product::all();
        return view('menaxher.home', ['product' => $product]);
    }
    public function kerkesat(){
        $product = Product::all();
        return view('menaxher.kerkesat', ['product' => $product]);
    }
}
