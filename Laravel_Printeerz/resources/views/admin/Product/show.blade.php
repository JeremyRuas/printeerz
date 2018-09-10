@extends('layouts/templateAdmin')

@section('content')
<div class="container mt-3">
<div class="row">
    <div class="col-sm" style="width: 18rem;">
    @if ($product->imageName)
        <img class="card-img-top right" src="/uploads/{{$product->imageName}}" alt="Image produit">
    @else
        <img src="/img/tee-shirt-blanc-gildan.jpg" class="card-img-top right" alt="img_default">
    @endif
    </div>

    <div class="col-sm">
    <h2 class="mt-3">{{ $product->nom }}</h2>
    <hr>

    <h5 class="mt-3">Identifiant: #{{ $product->id }}</h5>

    <h5 class="mt-3">Sexe: </h5>
    <div>{{ $product->sexe }}</div>

    <h5 class="mt-3">Référence fournisseur: </h5>
    <div>{{ $product->reference }}</div>

    <h5 class="mt-3">tailles disponibles: </h5>
    <div>{{ $product->tailles->pluck('nom') }}</div>

    <h5 class="mt-3">Zones d'impression: </h5>
    <div>{{ $product->zones->pluck('nom') }}</div>

    <h5 class="mt-3">Couleurs disponibles: </h5>
    <div>{{ $product->couleurs->pluck('nom') }}</div>

    <h5 class="mt-3">Commentaires: </h5>

    @if(strlen($product->commentaires) != 0)
    <div>{{ $product->commentaires }}</div>
    <br>
    @else
    <td>{{ '...' }}</td>
    @if (!$product->imageName)
    <div><i>(image par défault)</i></div>
    @endif
    <br>
    @endif
    <br>

    <a role="button" class='btn btn-success btn-sm' href="{{route('edit_product', $product->id)}}"  title="Modification du produit">Modifier</a>
    <a role="button" class='btn btn-danger btn-sm' href="{{route('destroy_product', $product->id)}}"  title="Suppression du produit">Supprimer</a>
    <a class='btn btn-secondary btn-sm' href="{{route('index_product')}}"> Retour </a>
    <hr>
</div>
</div>
</div>
@endsection