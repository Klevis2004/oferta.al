<?php

namespace App\Http\Controllers;

use App\Models\Artikuj;
use App\Models\Preferencat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferencatController extends Controller
{
    public function index(){
        $artikuj = Preferencat::join('artikujs', 'preferencats.artikujs_id' , '=' ,'artikujs.id')
        ->select('artikujs.emri', 'artikujs.id', 'artikujs.cmimi', 'artikujs.foto', 'artikujs.pershkrimi')
        ->where('wish', 1)
        ->where('user_id', Auth::id())
        ->get();
        return view('contain.preferencat', ['artikuj' => $artikuj]);
    }
    

    public function storeWish(Request $request){
        $validated['user_id'] = Auth::user()->id;
        $validated['artikujs_id'] = $request->input('artikull_id');
        $validated['wish'] = 1;
        Preferencat::create($validated);

        return redirect()->back()->with('success', 'Produkti u shtua te lista e preferencave!');
    }

    
    public function unlike(Request $request, $id)
    {
        $validated['wish'] = 2;
        
        $oferta = Preferencat::where('artikujs_id', $id)->where('user_id', Auth::id())->first();

        $oferta->update($validated);
    
        return redirect()->back()->with('success', 'Produkti u hoq nga lista e preferencave!');
    }
    
    public function like(Request $request, $id)
    {
        $validated['wish'] = 1;
        
        $oferta = Preferencat::where('artikujs_id', $id)->where('user_id', Auth::id())->first();

        $oferta->update($validated);
    
        return redirect()->back()->with('success', 'Produkti u shtua te lista e preferencave!');
    }
}
