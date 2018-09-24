@extends('layouts/templateAdmin')

@section('content')
<div class="container mt-3">
<div class="row">
    <div class="col-sm" style="width: 18rem;">
    @if ($product->imageName != NULL)

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/uploads/{{$product->imageName}}" alt="Image produit">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/uploads/{{$product->imageName}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/uploads/{{$product->imageName}}" alt="Third slide">
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>

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

    <h5 class="mt-3">Tailles disponibles: </h5>
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