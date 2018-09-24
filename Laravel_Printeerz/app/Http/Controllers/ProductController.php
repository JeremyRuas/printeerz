<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Taille;
use App\Zone;
use App\Couleur;
use Illuminate\Http\Request;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isActivate;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware(isActivate::class);
        $this->middleware(isAdmin::class);
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $tailles = Taille::all();
        $couleurs = Couleur::all();
        return view('admin/Product.index', ['products' => $products, 'tailles' => $tailles, 'couleurs' => $couleurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin/Product.add', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'commentaires' => 'max:750',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $product = new Product;
        $product->nom = $request->nom;
        $product->reference = $request->reference;
        $product->commentaires = $request->commentaires;
        $product->save();
        $product->tailles()->sync($request->get('tailles_list'));
        $product->save();
        $product->couleurs()->sync($request->get('couleurs_list'));
        $product->zones()->sync($request->get('zones_list'));
        
        if ($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();           
            request()->image->move(public_path('uploads'), $imageName);

            $product->imageName = $imageName;
        }
        
        $product->save();
        return redirect('admin/Product/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin/Product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin/Product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (request('actual_nom') == request('nom')){
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'reference' => 'required|string|max:255',
                'commentaires' => 'max:750'
                
            ]);
            $id = $request->id;
            $product = Product::find($id);
            $product->nom = $request->nom;
            $product->reference = $request->reference;
            $product->commentaires = $request->commentaires;  
            $product->tailles()->sync($request->get('tailles_list'));
            $product->couleurs()->sync($request->get('couleurs_list'));
            $product->zones()->sync($request->get('zones_list'));

            if ($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $imageName);
    
                $product->imageName = $imageName;
            }
        }        
        else{
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'reference' => 'required|string|max:255',
                'commentaires' => 'max:750'
            ]);
    
            $id = $request->id;
            
            $product = Product::find($id);
            $product->nom = $request->nom;
            $product->reference = $request->reference;
            $product->commentaires = $request->commentaires;           
            $product->tailles()->sync($request->get('tailles_list'));
            $product->couleurs()->sync($request->get('couleurs_list'));
            $product->zones()->sync($request->get('zones_list'));

            if ($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $imageName);
    
                $user->imageName = $imageName;
            }
        }
        $product->save();
        return redirect('admin/Product/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/Product/index');
    }
}