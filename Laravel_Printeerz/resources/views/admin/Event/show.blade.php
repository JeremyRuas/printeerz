@extends('layouts/templateAdmin')

@section('content')
<div class="container mt-3">
<div class="row">
    <div class="col-sm" style="width: 18rem;">
    @if ($event->logoName)
        <img class="card-img-top right" src="/uploads/{{$event->logoName}}" alt="logo de l\'événement">
    @else
        <img src="/img/tee-shirt-blanc-gildan.jpg" class="card-img-top right" alt="img_default">
    @endif
    </div>

    <div class="col-sm">
    <h2 class="mt-3">{{ $event->nom }}</h2>
    <hr>

    <h5 class="mt-3">Identifiant: #{{ $event->id }}</h5>

    <h5 class="mt-3">Annonceur: </h5>
    <div>{{ $event->annonceur }}</div>
    
    <h5 class="mt-3">Client: </h5>
    @if($event->customer)
    <div>{{ $event->customer->denomination}}</div>
    @else
    <div><i>Inconnu</i></div>
    @endif

    <h5 class="mt-3">Lieu: </h5>
    <div>{{ $event->lieu }}</div>

    <h5 class="mt-3">Type d'événement: </h5>
    <div>{{ $event->type }}</div>

    <h5 class="mt-3">Date: </h5>
    <div>{{ $event->date }}</div>
    
    <h5 class="mt-3">Commentaires: </h5>

    @if(strlen($event->commentaires) != 0)
    <div>{{ $event->commentaires }}</div>
    <br>
    @else
    <td>{{ '...' }}</td>
    @if (!$event->logoName)
    <div><i>(logo par défault)</i></div>
    @endif
    <br>
    @endif
    <br>

    <a role="button" class='btn btn-success btn-sm' href="{{route('edit_event', $event->id)}}"  title="Modification du produit">Modifier</a>
    <a role="button" class='btn btn-danger btn-sm' href="{{route('destroy_event', $event->id)}}"  title="Suppression du produit">Supprimer</a>
    <a class='btn btn-secondary btn-sm' href="{{route('index_event')}}"> Retour </a>
    <hr>
</div>
</div>
</div>
@endsection