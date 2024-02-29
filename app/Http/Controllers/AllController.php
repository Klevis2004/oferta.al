<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfertaRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Oferta;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function produktet(){
        return view('contain.produktet');
    }
    public function dashboard(){
        $product = Product::where('user_id', Auth::id())->get();
        return view('dashboard', ['product' => $product]);
    }
    public function oferta($id){
        $product = Product::where('id', $id)->first();
        $oferta = Oferta::where('products_id', $id)->get();
        return view('contain.oferta', ['product' => $product, 'oferta' => $oferta]);
    }

    public function oferta_store(OfertaRequest $request){
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $allowedExtensions = ['pdf', 'xlsx', 'docx'];
            $extension = $uploadedFile->getClientOriginalExtension();
    
            if (in_array($extension, $allowedExtensions)) {
                $fileName = uniqid('document_') . '.' . $extension;
                $filePath = $uploadedFile->move(public_path('uploads/file'), $fileName);
                $validated['file'] = 'uploads/file/' . $fileName;
            } else {
                return redirect()->back()->with('error', 'Invalid file format. Please upload a PDF, DOC, or DOCX file.');
            }
        }

        $validated['products_id'] = $request->input('products_id');


        $oferta = Oferta::create($validated);
        return redirect()->back()->with('success', 'Oferta u dërgua me sukses!');
    }
    public function product_store(ProductRequest $request){
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        $product = Product::create($validated);
        return redirect()->back()->with('success', 'Prokti u krijua me sukses!');
    }
        public function check(Request $request, string $id)
    {
        $validated['status'] = 1;
        $oferta = Oferta::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Informacioni u përditësua me sukses!');
    }
    public function uncheck(Request $request, string $id)
    {
        $validated['status'] = 2;
        $oferta = Oferta::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Informacioni u përditësua me sukses!');
    }
    public function staus_comm(Request $request, string $id)
    {
        $validated['status_comm'] = $request->input('status_comm');
        $oferta = Oferta::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Mesazhi u dërgua me sukses!');
    }

    public function product_check(Request $request, string $id)
    {
        $validated['status'] = 1;
        $oferta = Product::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Informacioni u përditësua me sukses!');
    }
    public function product_uncheck(Request $request, string $id)
    {
        $validated['status'] = 2;
        $oferta = Product::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Informacioni u përditësua me sukses!');
    }
}
