<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isActivate;

class EventController extends Controller
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
        return view('admin/Event.add', ['select' => $select]);
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
            'commentaires' => 'max:750'
        ]);

        $event = new Event;
        $event->nom = $request->nom;
        $event->annonceur = $request->annonceur;
        $event->customer_id = $request->customer_id;
        $event->lieu = $request->lieu;
        $event->type = $request->type;
        $event->date = $request->date;
        $event->commentaires = $request->commentaires;
        $event->save();

        if ($request->hasFile('image')){
            $logoName = time().'.'.request()->image->getClientOriginalExtension();           
            request()->image->move(public_path('uploads'), $logoName);

            $event->logoName = $logoName;
        }
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
        return view('admin/Event.show', ['event' => $event]);
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
        $select = [];
        foreach($customers as $customer){
            $select[$customer->id] = $customer->denomination;
        }
        return view('admin/Event.edit', ['event' => $event, 'select' => $select]);
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
                'commentaires' => 'max:750'
            ]);
            $id = $request->id;
            $event = Event::find($id);
            $event->nom = $request->nom;
            $event->annonceur = $request->annonceur;
            $event->customer_id = $request->customer_id;
            $event->lieu = $request->lieu;
            $event->type = $request->type;
            $event->date = $request->date;
            $event->commentaires = $request->commentaires;

            if ($request->hasFile('image')){
                $logoName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $logoName);
    
                $event->logoName = $logoName;
            }
        }        
        else{
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'annonceur' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'lieu' => 'required|string|max:255',
                'commentaires' => 'max:750'
            ]);

            $id = $request->id;
            $event = Event::find($id);
            $event->nom = $request->nom;
            $event->annonceur = $request->annonceur;
            $event->customer_id = $request->customer_id;
            $event->lieu = $request->lieu;
            $event->type = $request->type;
            $event->date = $request->date;
            $event->commentaires = $request->commentaires;
            
            if ($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $imageName);
    
                $product->imageName = $imageName;
            }
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
