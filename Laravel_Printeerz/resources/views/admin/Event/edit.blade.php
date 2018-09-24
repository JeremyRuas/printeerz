@extends('layouts/templateAdmin')

@section('content')


<div class="container">

<h1 class="mt-3" >Modification d'un événement</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => array('EventController@update', 'id' => $event->id), 'files' => true]) !!}
        {{csrf_field()}}

        <div class="form-group">
        <br>
        {!! Form::label('nom', 'Entrer le nom : ') !!}
        {!! Form::text('nom', $event->nom, ['class' => 'form-control']) !!}
        <br>

        {!! Form::label('annonceur', 'Entrer l\'annonceur (si différent du client): ') !!}
        {!! Form::text('annonceur', $event->annonceur, ['class' => 'form-control']) !!}
        <br>

        <div class="form-group">
        {!! Form::label('customer_id', 'Sélectionner le client : ', ['class' => 'control-label']) !!}
        {!! Form::select('customer_id', $select, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('lieu', 'Entrer le lieu : ') !!}
        {!! Form::text('lieu', $event->lieu, ['class' => 'form-control', 'placeholder' => 'Lieu:']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('type', 'Entrer le type d\'événement : ') !!}
        {!! Form::text('type', $event->type, ['class' => 'form-control', 'placeholder' => 'Type:']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('date', 'Entrer la date de l\'événement : ') !!}
        {{ Form::date('date', new \DateTime(), ['class' => 'form-control', 'placeholder' => 'Date:']) }}
        </div>

        {!! Form::label('image', 'Ajouter le logo de l\'événement: ') !!}
        {!! Form::file('image', array('class' => 'form-control')) !!}
        <br>

        {!! Form::label('commentaires', 'Commentaires : ') !!}
        <textarea class="form-control" name="commentaires" maxlength="150" rows="4" cols="50" placeholder="Vous pouvez ajouter ici des informations concernant l'événement."></textarea>

        <input type="hidden" class="form-control" name="actual_nom" value= '{{ $event->nom }}'>

        <br>
        {!! Form::submit('Modifer', ['class' => 'btn btn-primary btn-sm']) !!}       

        {!! Form::close() !!}

        <a class='btn btn-secondary btn-sm' href="{{route('index_product')}}"> Retour </a>
    </div>
</div>
@endsection