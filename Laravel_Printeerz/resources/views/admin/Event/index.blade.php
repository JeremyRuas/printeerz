@extends('layouts/templateAdmin')

@section('content')
<div class="container">

<br>
  	<a href="{{action('EventController@create')}}"><button type="button" title="Ajout d'un nouvel événement" class="btn btn-primary right btn-sm">Nouvel événement</button></a>
<br>
<br>
<table class="display table table-striped datatable" >
    <thead>
		<tr>
            <th>Avatar</th>
            <th>Noms</th>
            <th>Annonceurs</th>
            <th>Clients</th>
            <th>Lieux</th>
            <th>Types</th>
            <th>Date</th>
            <th>Commentaires</th>
            <th>Actions</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
@foreach ($events as $event)
    <tr>
    @if($event->logoName)
    <td><img src="/uploads/{{$event->logoName}}" class="miniRoundedImage" alt="img_event" ></td>
    @else
    <td><img src="/uploads/no_image.jpg" class="miniRoundedImage" alt="img_event" ></td>
    @endif
    <td>{{ $event->nom }}</td>
    <td>{{ $event->annonceur }}</td>

    @if($event->customer)
    <td>{{ $event->customer->denomination }}</td>
    @else
    <td><i>Inconnu</i></td>
    @endif

    <td>{{ $event->lieu }}</td>
    <td>{{ $event->type }}</td>
    <td>{{ $event->date }}</td>
    <?php $commentaire = $event->commentaires;
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
    <td><a class='btn btn-success btn-sm' href="{{route('show_event', $event->id)}}"  title="Détails de l'événement"> Détails </a></td></tr>
@endforeach
    </tbody>
    </div>

@endsection
