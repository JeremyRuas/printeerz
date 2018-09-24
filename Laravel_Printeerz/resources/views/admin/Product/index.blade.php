@extends('layouts/templateAdmin')

@section('content')
<div class="container">

<br>
  	<a href="{{action('ProductController@create')}}"><button type="button" title="Ajout d'un nouveau produit" class="btn btn-primary btn-sm">Nouveau produit</button></a>
  	<a href="{{action('CouleurController@index')}}"><button type="button" title="Gestion des couleurs" class="btn btn-info btn-sm" role="group" aria-label="...">Couleurs/Tailles</button></a>
    <a href="{{action('CouleurController@index')}}"><button type="button" title="Gestion des zones" class="btn btn-info btn-sm" role="group" aria-label="...">Zones</button></a>
<hr>

<table class="display table table-striped datatable" >
    <thead>
		<tr>
            <th>Noms</th>
            <th>Références</th>
            <th>Sexes</th>
            <th>Tailles</th>
            <th>Zones d'imp.</th>
            <th>Couleurs</th>
            <th>Commentaires</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
@foreach ($products as $product)

    <tr><td>{{ $product->nom }}</td>
    <td>{{ $product->reference }}</td>
    @if ($product->sexe == 'homme')
        <td> Homme </td>
    @else
        <td> Femme </td>
    @endif
    <?php $list_tailles = $product->tailles->pluck('nom')->toArray();?>
    <td><?php echo implode(', ', $list_tailles); ?></td>
    
    <?php $list_zones = $product->zones->pluck('nom')->toArray();?>
    <td><?php echo implode(', ', $list_zones); ?></td>

    <?php $list_couleurs = $product->couleurs->pluck('nom')->toArray();?>
    <td><?php echo implode(', ', $list_couleurs); ?></td>


    <?php $commentaire = $product->commentaires;
    if(strlen($commentaire) > 50){
        $commentaire = substr($commentaire, 0, 50);
        $commentaire .= '...';
    }
    ?>
    @if(strlen($commentaire) != 0)
    <td>{{ $commentaire }}</td>
    @else
    <td>{{ '...' }}</td>
    @endif
    <td><a class='btn btn-success btn-sm' href="{{route('show_product', $product->id)}}"  title="Détails du produit"> Détails </a></td></tr>

@endforeach
    </tbody>
    </div>

@endsection
