<?php

namespace App\Http\Controllers;

use App\Models\Artikuj;
use App\Models\Oferta;
use App\Models\Preferencat;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikulliController extends Controller
{
    public function create(Request $request)
    {

        $artikull = new Artikuj();

        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);

            $file = $request->file('foto');
            $filename = random_int('100000000', '100000000000') . '.' . $file->extension();

            $file->move(public_path('images'), $filename);
            $artikull['foto'] = $filename;
        }

        $artikull->pershkrimi = $request->input('pershkrimi');
        $artikull->cmimi = $request->input('cmimi');
        $artikull->cmimiFillestar = $request->input('cmimiFillestar');
        $artikull->emri = $request->input('emri');
        $artikull->save();

        session()->flash('success', 'Artikulli u regjistrua me sukses!');

        return redirect()->back();
    }

    public function index()
    {
        $artikuj = Artikuj::all();
        $preferencat = Preferencat::all();
        return view('contain.produktet', ['artikuj' => $artikuj, 'preferencat' => $preferencat]);
    }

    public function historiku(){
        $product = Product::where('user_id', Auth::id())->get();
        return view('contain.historiku', ['product' => $product]);
    }
}

