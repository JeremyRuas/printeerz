<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Taille;
use App\Zone;
use App\Couleur;
use App\ImageZone;
use App\Gabarit;

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
        $zones = Zone::all();
        $couleurs = Couleur::all();
        $select_couleurs = [];
        foreach($couleurs as $couleur){
            $select_couleurs[$couleur->id] = $couleur->nom;
        }
        $gabarits = Gabarit::all();
        $select_gabarits = [];
        foreach($gabarits as $gabarit){
            $select_gabarits[$gabarit->id] = $gabarit->nom;
        }
        return view('admin/Product.add', ['products' => $products, 'zones' => $zones, 'select_couleurs' => $select_couleurs, 'select_gabarits' => $select_gabarits]);
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
            'description' => 'max:750',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $product = new Product;
        
        $product->nom = $request->nom;
        $product->reference = $request->reference;
        $product->description = $request->description;
        $product->sexe = $request->sexe;
        $product->color1 = $request->color1;
        $product->color2 = $request->color2;
        $product->color3 = $request->color3;

        $product->color1_FAV_gabarit = $request->color1_FAV_gabarit;
        $product->color2_FAV_gabarit = $request->color2_FAV_gabarit;
        $product->color3_FAV_gabarit = $request->color3_FAV_gabarit;

        $product->color1_FAR_gabarit = $request->color1_FAR_gabarit;
        $product->color2_FAR_gabarit = $request->color2_FAR_gabarit;
        $product->color3_FAR_gabarit = $request->color3_FAR_gabarit;

        $product->color1_coeur_gabarit = $request->color1_coeur_gabarit;
        $product->color2_coeur_gabarit = $request->color2_coeur_gabarit;
        $product->color3_coeur_gabarit = $request->color3_coeur_gabarit;

        $product->save();
        $product->tailles()->sync($request->get('tailles_list'));
        // $product->zones()->sync($request->get('zones_list'));

        /*~~~~~~~~~~~___________REQUEST ZONE FAV__________~~~~~~~~~~~~*/
        if($request->color1_FAV)
        $product->color1_FAV = 1;
        if($request->color2_FAV)
        $product->color2_FAV = 1;
        if($request->color3_FAV)
        $product->color3_FAV = 1;

        /*~~~~~~~~~~~___________REQUEST ZONE FAR__________~~~~~~~~~~~~*/
        if($request->color1_FAR)
        $product->color1_FAR = 1;
        if($request->color2_FAR)
        $product->color2_FAR = 1;
        if($request->color3_FAR)
        $product->color3_FAR = 1;

        /*~~~~~~~~~~~___________REQUEST ZONE COEUR__________~~~~~~~~~~~~*/
        if($request->color1_coeur)
        $product->color1_coeur = 1;
        if($request->color2_coeur)
        $product->color2_coeur = 1;
        if($request->color3_coeur)
        $product->color3_coeur = 1;

        /*~~~~~~~~~~~___________Image Principale__________~~~~~~~~~~~~*/
        if ($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();           
            request()->image->move(public_path('uploads'), $imageName);

            $product->imageName = $imageName;
        }

        /*~~~~~~~~~~~___________Image color1__________~~~~~~~~~~~~*/
        if ($request->hasFile('color1_coeur_image')){
            $color1_coeur_imageName = time().'1.'.request()->color1_coeur_image->getClientOriginalExtension();           
            request()->color1_coeur_image->move(public_path('uploads'), $color1_coeur_imageName);

            $product->color1_coeur_imageName = $color1_coeur_imageName;
        }
        if ($request->hasFile('color1_FAV_image')){
            $color1_FAV_imageName = time().'2.'.request()->color1_FAV_image->getClientOriginalExtension();           
            request()->color1_FAV_image->move(public_path('uploads'), $color1_FAV_imageName);

            $product->color1_FAV_imageName = $color1_FAV_imageName;
        }
        if ($request->hasFile('color1_FAR_image')){
            $color1_FAR_imageName = time().'3.'.request()->color1_FAR_image->getClientOriginalExtension();           
            request()->color1_FAR_image->move(public_path('uploads'), $color1_FAR_imageName);

            $product->color1_FAR_imageName = $color1_FAR_imageName;
        }

        /*~~~~~~~~~~~___________Images color2__________~~~~~~~~~~~~*/
        if ($request->hasFile('color2_coeur_image')){
            $color2_coeur_imageName = time().'4.'.request()->color2_coeur_image->getClientOriginalExtension();           
            request()->color2_coeur_image->move(public_path('uploads'), $color2_coeur_imageName);

            $product->color2_coeur_imageName = $color2_coeur_imageName;
        }
        if ($request->hasFile('color2_FAV_image')){
            $color2_FAV_imageName = time().'5.'.request()->color2_FAV_image->getClientOriginalExtension();           
            request()->color2_FAV_image->move(public_path('uploads'), $color2_FAV_imageName);

            $product->color2_FAV_imageName = $color2_FAV_imageName;
        }
        if ($request->hasFile('color2_FAR_image')){
            $color2_FAR_imageName = time().'6.'.request()->color2_FAR_image->getClientOriginalExtension();           
            request()->color2_FAR_image->move(public_path('uploads'), $color2_FAR_imageName);

            $product->color2_FAR_imageName = $color2_FAR_imageName;
        }

        /*~~~~~~~~~~~___________Images color3__________~~~~~~~~~~~~*/
        if ($request->hasFile('color3_coeur_image')){
            $color3_coeur_imageName = time().'7.'.request()->color3_coeur_image->getClientOriginalExtension();           
            request()->color3_coeur_image->move(public_path('uploads'), $color3_coeur_imageName);

            $product->color3_coeur_imageName = $color3_coeur_imageName;
        }
        if ($request->hasFile('color3_FAV_image')){
            $color3_FAV_imageName = time().'8.'.request()->color3_FAV_image->getClientOriginalExtension();           
            request()->color3_FAV_image->move(public_path('uploads'), $color3_FAV_imageName);

            $product->color3_FAV_imageName = $color3_FAV_imageName;
        }
        if ($request->hasFile('color3_FAR_image')){
            $color3_FAR_imageName = time().'9.'.request()->color3_FAR_image->getClientOriginalExtension();           
            request()->color3_FAR_image->move(public_path('uploads'), $color3_FAR_imageName);

            $product->color3_FAR_imageName = $color3_FAR_imageName;
        }
        
        $product->save();
        return redirect('admin/Product/index')->with('status', 'Produit ajouté');
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
        $couleurs = Couleur::all();
        
        return view('admin/Product.show', ['product' => $product, 'couleurs' => $couleurs]);
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
                'description' => 'max:750'
            ]);
            $id = $request->id;
            $product = Product::find($id);
            $product->nom = $request->nom;
            $product->reference = $request->reference;
            $product->description = $request->description;  
            $product->sexe = $request->sexe;
            $product->color1 = $request->color1;
            $product->color2 = $request->color2;
            $product->color3 = $request->color3;
            $product->tailles()->sync($request->get('tailles_list'));
            //$product->couleurs()->sync($request->get('couleurs_list'));
            // $product->zones()->sync($request->get('zones_list'));

/*~~~~~~~~~~~___________REQUEST ZONE COLOR1__________~~~~~~~~~~~~*/
            if($request->color1_FAV)
            $product->color1_FAV = 1;
            if($request->color2_FAV)
            $product->color2_FAV = 1;
            if($request->color3_FAV)
            $product->color3_FAV = 1;

        /*~~~~~~~~~~~___________REQUEST ZONE COLOR2__________~~~~~~~~~~~~*/
            if($request->color1_FAR)
            $product->color1_FAR = 1;
            if($request->color2_FAR)
            $product->color2_FAR = 1;
            if($request->color3_FAR)
            $product->color3_FAR = 1;

            /*~~~~~~~~~~~___________REQUEST ZONE COLOR3__________~~~~~~~~~~~~*/
            if($request->color1_coeur)
            $product->color1_coeur = 1;
            if($request->color2_coeur)
            $product->color2_coeur = 1;
            if($request->color3_coeur)
            $product->color3_coeur = 1;

            if ($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $imageName);
    
                $product->imageName = $imageName;
            }

            /*~~~~~~~~~~~___________Image color1__________~~~~~~~~~~~~*/
            if ($request->hasFile('color1_coeur_image')){
                $color1_coeur_imageName = time().'1.'.request()->color1_coeur_image->getClientOriginalExtension();           
                request()->color1_coeur_image->move(public_path('uploads'), $color1_coeur_imageName);

                $product->color1_coeur_imageName = $color1_coeur_imageName;
            }
            if ($request->hasFile('color1_FAV_image')){
                $color1_FAV_imageName = time().'2.'.request()->color1_FAV_image->getClientOriginalExtension();           
                request()->color1_FAV_image->move(public_path('uploads'), $color1_FAV_imageName);

                $product->color1_FAV_imageName = $color1_FAV_imageName;
            }
            if ($request->hasFile('color1_FAR_image')){
                $color1_FAR_imageName = time().'3.'.request()->color1_FAR_image->getClientOriginalExtension();           
                request()->color1_FAR_image->move(public_path('uploads'), $color1_FAR_imageName);

                $product->color1_FAR_imageName = $color1_FAR_imageName;
            }

            /*~~~~~~~~~~~___________Images color2__________~~~~~~~~~~~~*/
            if ($request->hasFile('color2_coeur_image')){
                $color2_coeur_imageName = time().'4.'.request()->color2_coeur_image->getClientOriginalExtension();           
                request()->color2_coeur_image->move(public_path('uploads'), $color2_coeur_imageName);

                $product->color2_coeur_imageName = $color2_coeur_imageName;
            }
            if ($request->hasFile('color2_FAV_image')){
                $color2_FAV_imageName = time().'5.'.request()->color2_FAV_image->getClientOriginalExtension();           
                request()->color2_FAV_image->move(public_path('uploads'), $color2_FAV_imageName);

                $product->color2_FAV_imageName = $color2_FAV_imageName;
            }
            if ($request->hasFile('color2_FAR_image')){
                $color2_FAR_imageName = time().'6.'.request()->color2_FAR_image->getClientOriginalExtension();           
                request()->color2_FAR_image->move(public_path('uploads'), $color2_FAR_imageName);

                $product->color2_FAR_imageName = $color2_FAR_imageName;
            }

            /*~~~~~~~~~~~___________Images color3__________~~~~~~~~~~~~*/
            if ($request->hasFile('color3_coeur_image')){
                $color3_coeur_imageName = time().'7.'.request()->color3_coeur_image->getClientOriginalExtension();           
                request()->color3_coeur_image->move(public_path('uploads'), $color3_coeur_imageName);

                $product->color3_coeur_imageName = $color3_coeur_imageName;
            }
            if ($request->hasFile('color3_FAV_image')){
                $color3_FAV_imageName = time().'8.'.request()->color3_FAV_image->getClientOriginalExtension();           
                request()->color3_FAV_image->move(public_path('uploads'), $color3_FAV_imageName);

                $product->color3_FAV_imageName = $color3_FAV_imageName;
            }
            if ($request->hasFile('color3_FAR_image')){
                $color3_FAR_imageName = time().'9.'.request()->color3_FAR_image->getClientOriginalExtension();           
                request()->color3_FAR_image->move(public_path('uploads'), $color3_FAR_imageName);

                $product->color3_FAR_imageName = $color3_FAR_imageName;
            }
        }        
        else{
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'reference' => 'required|string|max:255',
                'description' => 'max:750'
            ]);
    
            $id = $request->id;
            
            $product = Product::find($id);
            $product->nom = $request->nom;
            $product->reference = $request->reference;
            $product->description = $request->description; 
            $product->sexe = $request->sexe;  
            $product->color1 = $request->color1;
            $product->color2 = $request->color2;
            $product->color3 = $request->color3;        
            $product->tailles()->sync($request->get('tailles_list'));
            // $product->zones()->sync($request->get('zones_list'));

/*~~~~~~~~~~~___________REQUEST ZONE COLOR1__________~~~~~~~~~~~~*/
            if($request->color1_FAV)
            $product->color1_FAV = 1;
            if($request->color2_FAV)
            $product->color2_FAV = 1;
            if($request->color3_FAV)
            $product->color3_FAV = 1;

        /*~~~~~~~~~~~___________REQUEST ZONE COLOR2__________~~~~~~~~~~~~*/
            if($request->color1_FAR)
            $product->color1_FAR = 1;
            if($request->color2_FAR)
            $product->color2_FAR = 1;
            if($request->color3_FAR)
            $product->color3_FAR = 1;

            /*~~~~~~~~~~~___________REQUEST ZONE COLOR3__________~~~~~~~~~~~~*/
            if($request->color1_coeur)
            $product->color1_coeur = 1;
            if($request->color2_coeur)
            $product->color2_coeur = 1;
            if($request->color3_coeur)
            $product->color3_coeur = 1;

            if ($request->hasFile('image')){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();           
                request()->image->move(public_path('uploads'), $imageName);
    
                $product->imageName = $imageName;
            }

            /*~~~~~~~~~~~___________Image color1__________~~~~~~~~~~~~*/
            if ($request->hasFile('color1_coeur_image')){
                $color1_coeur_imageName = time().'1.'.request()->color1_coeur_image->getClientOriginalExtension();           
                request()->color1_coeur_image->move(public_path('uploads'), $color1_coeur_imageName);

                $product->color1_coeur_imageName = $color1_coeur_imageName;
            }
            if ($request->hasFile('color1_FAV_image')){
                $color1_FAV_imageName = time().'2.'.request()->color1_FAV_image->getClientOriginalExtension();           
                request()->color1_FAV_image->move(public_path('uploads'), $color1_FAV_imageName);

                $product->color1_FAV_imageName = $color1_FAV_imageName;
            }
            if ($request->hasFile('color1_FAR_image')){
                $color1_FAR_imageName = time().'3.'.request()->color1_FAR_image->getClientOriginalExtension();           
                request()->color1_FAR_image->move(public_path('uploads'), $color1_FAR_imageName);

                $product->color1_FAR_imageName = $color1_FAR_imageName;
            }

            /*~~~~~~~~~~~___________Images color2__________~~~~~~~~~~~~*/
            if ($request->hasFile('color2_coeur_image')){
                $color2_coeur_imageName = time().'4.'.request()->color2_coeur_image->getClientOriginalExtension();           
                request()->color2_coeur_image->move(public_path('uploads'), $color2_coeur_imageName);

                $product->color2_coeur_imageName = $color2_coeur_imageName;
            }
            if ($request->hasFile('color2_FAV_image')){
                $color2_FAV_imageName = time().'5.'.request()->color2_FAV_image->getClientOriginalExtension();           
                request()->color2_FAV_image->move(public_path('uploads'), $color2_FAV_imageName);

                $product->color2_FAV_imageName = $color2_FAV_imageName;
            }
            if ($request->hasFile('color2_FAR_image')){
                $color2_FAR_imageName = time().'6.'.request()->color2_FAR_image->getClientOriginalExtension();           
                request()->color2_FAR_image->move(public_path('uploads'), $color2_FAR_imageName);

                $product->color2_FAR_imageName = $color2_FAR_imageName;
            }

            /*~~~~~~~~~~~___________Images color3__________~~~~~~~~~~~~*/
            if ($request->hasFile('color3_coeur_image')){
                $color3_coeur_imageName = time().'7.'.request()->color3_coeur_image->getClientOriginalExtension();           
                request()->color3_coeur_image->move(public_path('uploads'), $color3_coeur_imageName);

                $product->color3_coeur_imageName = $color3_coeur_imageName;
            }
            if ($request->hasFile('color3_FAV_image')){
                $color3_FAV_imageName = time().'8.'.request()->color3_FAV_image->getClientOriginalExtension();           
                request()->color3_FAV_image->move(public_path('uploads'), $color3_FAV_imageName);

                $product->color3_FAV_imageName = $color3_FAV_imageName;
            }
            if ($request->hasFile('color3_FAR_image')){
                $color3_FAR_imageName = time().'9.'.request()->color3_FAR_image->getClientOriginalExtension();           
                request()->color3_FAR_image->move(public_path('uploads'), $color3_FAR_imageName);

                $product->color3_FAR_imageName = $color3_FAR_imageName;
            }
        }
        $product->save();
        return redirect('admin/Product/index')->with('status', 'Le produit a été correctement modifié.');
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
        return redirect('admin/Product/index')->with('status', 'Le produit a été correctement supprimé.');
    }
}