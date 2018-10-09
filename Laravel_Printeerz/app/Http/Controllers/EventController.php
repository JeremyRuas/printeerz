<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use App\Customer;
use App\Product;
use App\ImageZone;
use App\Couleur;
use Illuminate\Http\Request;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isActivate;

class EventController extends Controller
{
    public function __construct(){
        $this->middleware(isActivate::class);
       // $this->middleware(isAdmin::class);
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin/Event.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $events = Event::all();
        $customers = Customer::all();
        $select = [];
        foreach($customers as $customer){
            $select[$customer->id] = $customer->denomination;
        }
        $products = Product::all();
        $select_products = [];
        foreach($products as $product){
            $select[$product->id] = $product->denomination;
        }
        return view('admin/Event.add', ['select_products' => $select_products, 'select' => $select]);
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
            'annonceur' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lieu' => 'required|string|max:255',
            'description' => 'max:750'
        ]);

        $event = new Event;
        //dd($request);
        $event->nom = $request->nom;
        $event->annonceur = $request->annonceur;
        $event->customer_id = $request->customer_id;
        $event->save();
        $event->products()->sync($request->get('products_list'));
        $event->customer_id = $request->customer_id;
        $event->save();
        $event->lieu = $request->lieu;
        $event->type = $request->type;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->save();

        if ($request->hasFile('image')){
            $logoName = time().'.'.request()->image->getClientOriginalExtension();           
            request()->image->move(public_path('uploads'), $logoName);

            $event->logoName = $logoName;
        }
        // if ($request->hasFile('image_coeur')){
        //     $coeur_imageName = time().'1.'.request()->image_coeur->getClientOriginalExtension();           
        //     request()->image_coeur->move(public_path('uploads'), $coeur_imageName);

        //     $event->coeur_imageName = $coeur_imageName;
        // }
        // if ($request->hasFile('image_face_avant')){
        //     $face_avant_imageName = time().'2.'.request()->image_face_avant->getClientOriginalExtension();           
        //     request()->image_face_avant->move(public_path('uploads'), $face_avant_imageName);

        //     $event->face_avant_imageName = $face_avant_imageName;
        // }
        // if ($request->hasFile('image_face_arriere')){
        //     $face_arriere_imageName = time().'3.'.request()->image_face_arriere->getClientOriginalExtension();           
        //     request()->image_face_arriere->move(public_path('uploads'), $face_arriere_imageName);

        //     $event->face_arriere_imageName = $face_arriere_imageName;
        // }
        
        $event->save();

        return redirect('admin/Event/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $product = Product::find($id);
        return view('admin/Event.show', ['event' => $event, 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $customers = Customer::all();
        $products = Product::all();

        $select = [];
        foreach($customers as $customer){
            $select[$customer->id] = $customer->denomination;
        }
        $select_products = [];
        foreach($products as $product){
            $select[$product->id] = $product->denomination;
        }
        return view('admin/Event.edit', ['event' => $event, 'select' => $select, 'select_products' => $select_products]);
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
                'annonceur' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'lieu' => 'required|string|max:255',
                'description' => 'max:750'
            ]);
            $id = $request->id;
            $event = Event::find($id);
            $event->nom = $request->nom;
            $event->annonceur = $request->annonceur;
            $event->customer_id = $request->customer_id;
            $event->save();
            $event->products()->sync($request->get('products_list'));
            $event->couleurs()->sync($request->get('couleurs_list'));
            $event->save();
            $event->lieu = $request->lieu;
            $event->type = $request->type;
            $event->date = $request->date;
            $event->description = $request->description;

            if ($request->hasFile('image')){
                $logoName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $logoName);
    
                $event->logoName = $logoName;
            }

            // if ($request->hasFile('image_coeur')){
            //     $coeur_imageName = time().'1.'.request()->image_coeur->getClientOriginalExtension();           
            //     request()->image_coeur->move(public_path('uploads'), $coeur_imageName);
    
            //     $event->coeur_imageName = $coeur_imageName;
            // }
            // if ($request->hasFile('image_face_avant')){
            //     $face_avant_imageName = time().'2.'.request()->image_face_avant->getClientOriginalExtension();           
            //     request()->image_face_avant->move(public_path('uploads'), $face_avant_imageName);
    
            //     $event->face_avant_imageName = $face_avant_imageName;
            // }
            // if ($request->hasFile('image_face_arriere')){
            //     $face_arriere_imageName = time().'3.'.request()->image_face_arriere->getClientOriginalExtension();           
            //     request()->image_face_arriere->move(public_path('uploads'), $face_arriere_imageName);
    
            //     $event->face_arriere_imageName = $face_arriere_imageName;
            // }
        }        
        else{
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'annonceur' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'lieu' => 'required|string|max:255',
                'description' => 'max:750'
            ]);

            $id = $request->id;
            $event = Event::find($id);
            $event->nom = $request->nom;
            $event->annonceur = $request->annonceur;
            $event->customer_id = $request->customer_id;
            $event->save();
            $event->products()->sync($request->get('products_list'));
            $event->couleurs()->sync($request->get('couleurs_list'));
            $event->save();
            $event->lieu = $request->lieu;
            $event->type = $request->type;
            $event->date = $request->date;
            $event->description = $request->description;
            
            if ($request->hasFile('image')){
                $logoName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $logoName);
    
                $event->logoName = $logoName;
            }

            // if ($request->hasFile('image_coeur')){
            //     $coeur_imageName = time().'1.'.request()->image_coeur->getClientOriginalExtension();           
            //     request()->image_coeur->move(public_path('uploads'), $coeur_imageName);
    
            //     $event->coeur_imageName = $coeur_imageName;
            // }
            // if ($request->hasFile('image_face_avant')){
            //     $face_avant_imageName = time().'2.'.request()->image_face_avant->getClientOriginalExtension();           
            //     request()->image_face_avant->move(public_path('uploads'), $face_avant_imageName);
    
            //     $event->face_avant_imageName = $face_avant_imageName;
            // }
            // if ($request->hasFile('image_face_arriere')){
            //     $face_arriere_imageName = time().'3.'.request()->image_face_arriere->getClientOriginalExtension();           
            //     request()->image_face_arriere->move(public_path('uploads'), $face_arriere_imageName);
    
            //     $event->face_arriere_imageName = $face_arriere_imageName;
            // }

        }
        $event->save();
        return redirect('admin/Event/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        $event->delete();
        return redirect('admin/Event/index');
    }
}
