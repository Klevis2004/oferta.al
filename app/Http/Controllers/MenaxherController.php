<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MenaxherController extends Controller
{
    public function home(){
        $productt = Product::all();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.index', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function ne_shqyrtim(){
        $productt = Product::where('status', 0)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.ne_shqytim', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function konfirmo(){
        $productt = Product::where('status', 1)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.konfirmo', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function refuzuar(){
        $productt = Product::where('status', 2)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.refuzuar', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function per_prodhim(){
        $productt = Product::where('status', 3)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.per_prodhim', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function oferta_refuzuar(){
        $productt = Product::where('status', 4)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.oferta_refuzuar', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function perfunduar(){
        $productt = Product::where('status', 6)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.perfunduar', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function ne_proces(){
        $productt = Product::where('status', 5)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.ne_proces', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
    public function kerkesat(){
        $productt = Product::where('status', 0)->get();
        $product = Product::where('status', 0)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('menaxher.kerkesat', ['productt' => $productt, 'product' => $product, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
    }
}
