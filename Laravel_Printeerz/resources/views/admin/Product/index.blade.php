@extends('layouts/templateAdmin')

@section('content')
<div class="container">

<h1 class="mt-3">Gestion des produits</h1>
<br>
  	<a href="{{action('ProductController@create')}}"><button type="button" title="Ajout d'un nouveau produit" class="btn btn-primary right btn-sm">Nouveau produit</button></a>
<br>
<br>

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
    <?php $list = $product->tailles->pluck('nom');?>
    <td>{{ $list }}</td>
    <td>{{ $product->zones->pluck('nom') }}</td>
    <td>{{ $product->couleurs->pluck('nom') }}</td>
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
