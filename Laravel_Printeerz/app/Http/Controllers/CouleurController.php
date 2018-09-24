<?php

namespace App\Http\Controllers;

use DB;
use App\Couleur;
use App\Customer;
use App\Taille;

use Illuminate\Http\Request;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isActivate;

class CouleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couleurs = Couleur::all();
        $tailles = Taille::all();
        return view('admin/Couleur.index', ['couleurs' => $couleurs, 'tailles' => $tailles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couleurs = Couleur::all();
        return view('admin/Couleur.add', ['couleurs' => $couleurs]);
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
            'nom' => 'required|string|max:255'

        ]);
        $couleur = new Couleur;
        $couleur->nom = $request->nom;
        
        $couleur->save();
        return redirect('admin/Couleur/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $couleur = Couleur::find($id);
        return view('admin/Couleur.show', ['couleur' => $couleur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $couleur = Couleur::find($id);
        return view('admin/Couleur.edit', ['couleur' => $couleur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (request('actual_nom') == request('nom')){
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255'
    
            ]);
            $couleur = new Couleur;
            $couleur->nom = $request->nom;
        }        
        else{
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255'
    
            ]);
            $couleur = new Couleur;
            $couleur->nom = $request->nom;
        }
        $couleur->save();
        return redirect('admin/Couleur/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $couleur = Couleur::find($id);
        $couleur->delete();
        return redirect('admin/Couleur/index');
    }
}
