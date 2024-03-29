<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfertaRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Artikuj;
use App\Models\Oferta;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AllController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function dashboard(){
        $product = Product::where('user_id', Auth::id())->get();
        return view('dashboard', ['product' => $product]);
    }
    public function oferta($id){
        $poductt = Artikuj::all();
        $product = Product::where('id', $id)->first();
        $oferta = Oferta::where('products_id', $id)->get();
        $pro = Product::whereNotIn('status', [6])->count();
        $ne_shqyrtim = Product::where('status', 0)->count();
        $konfirmo = Product::where('status', 1)->count();
        $refuzo = Product::where('status', 2)->count();
        $per_prodhim = Product::where('status', 3)->count();
        $oferta_refuzuar = Product::where('status', 4)->count();
        $ne_proces = Product::where('status', 5)->count();
        return view('contain.oferta', ['product' => $product, 'oferta' => $oferta, 'poductt' => $poductt, 'pro' => $pro, 'ne_shqyrtim' => $ne_shqyrtim, 'konfirmo' => $konfirmo, 'refuzo' => $refuzo, 'per_prodhim' => $per_prodhim, 'oferta_refuzuar' => $oferta_refuzuar, 'ne_proces' => $ne_proces]);
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

        $artikull_id = $request->input('emri');
        $artikull = Artikuj::findOrFail($artikull_id);
        $cmimitotal = $request->input('sasia') * $artikull->cmimi;

        $id = $request->input('products_id');
        $product = Product::findOrFail($id);
        $total = $product->cmimi_total += $cmimitotal;
        
        $product->save();

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
        $oferta = Oferta::findOrFail($id);

        if ($oferta->status == 0) {
            $cmimitotal = 0;
        } else { 
            $artikull_id =  $oferta->emri;
            $artikull = Artikuj::findOrFail($artikull_id);
            $cmimitotal = $oferta->sasia * $artikull->cmimi;
        }
        
        $id = $request->input('products_id');
        $product = Product::findOrFail($id);
        $product->cmimi_total += $cmimitotal;
       
        $product->save();

        
        $status = $oferta->status = 1;
        
        $oferta->save();
        
        return redirect()->back()->with('success', 'Informacioni u përditësua me sukses!');
    }
    public function uncheck(Request $request, string $id)
    {
      
        $oferta = Oferta::findOrFail($id);
        
        $artikull_id =  $oferta->emri;
        $artikull = Artikuj::findOrFail($artikull_id);
        $cmimitotal = $oferta->sasia * $artikull->cmimi;
        
        $id = $request->input('products_id');
        $product = Product::findOrFail($id);
        $product->cmimi_total -= $cmimitotal;
       
        $product->save();

        
        $status = $oferta->status = 2;
        
        $oferta->save();
        
        return redirect()->back()->with('success', 'Informacioni u përditësua me sukses!');
    }
        public function proces(Request $request, string $id)
    {
        $validated['status'] = 3;
        $oferta = Product::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Oferta u pranua me sukses!');
    }
    public function refuzuar(Request $request, string $id)
    {
        $validated['status'] = 4;
        $oferta = Product::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Oferta u refuzua me sukses!');
    }
    public function staus_comm(Request $request, string $id)
    {
        $validated['status_comm'] = $request->input('status_comm');
        $oferta = Oferta::findOrFail($id);
        
        $oferta->fill($validated);
        $oferta->save();

        return redirect()->back()->with('success', 'Mesazhi u dërgua me sukses!');
    }


public function cmimi(Request $request)
{
    try {
        $items = $request->all();

        foreach ($items['state'] as $index => $state) {
            $id = $state;
            
            $cmimi_total = $items['cmimi_total'][$index];
            $cmimi_ofetuar = $items['cmimi_ofetuar'][$index];

            $product = Product::findOrFail($id);

            $product->cmimi_total = $cmimi_total;
            $product->cmimi_ofetuar = $cmimi_ofetuar;
            $product['status'] = 1;

            $product->save();
        }

        // return response()->json(['success' => 'Çmimet u përditësuan me sukses!']);
        return redirect()->back()->with('success', 'Çmimet u përditësuan me sukses!');

    } catch (\Exception $e) {
        Log::error($e->getMessage());

        return response()->json(['error' => 'Ndodhi një gabim në procesimin e të dhënave. Ju lutem provoni përsëri më vonë.'], 500);
    }
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
    public function test()
    {
      return view('contain.test');
    }

    public function cmimi_total(ProductRequest $request, $id){

        $product = Product::findOrFail($id);
        $product->cmimi_total = $request->input('cmimi_total');
        $product->cmimi_ofetuar = $request->input('cmimi_ofetuar');

        $product->save();
        return redirect()->back()->with('success', 'Çmimi u dërgua me sukses!');
    }
}
