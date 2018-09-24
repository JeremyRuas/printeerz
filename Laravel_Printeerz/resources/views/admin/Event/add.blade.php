@extends('layouts/templateAdmin')

@section('content')

<div class="container">

<h1 class="mt-3" >Ajout d'un événement</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => 'EventController@store', 'files' => true]) !!}
        {{csrf_field()}}

        <div class="form-group">
        {!! Form::label('nom', 'Entrer la nom : ') !!}
        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom:']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('annonceur', 'Entrer l\'annonceur : ') !!}
            {!! Form::text('annonceur', null, ['class' => 'form-control', 'placeholder' => 'Annonceur:']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('customer_id', 'Sélectionner le client : ') !!}
        {!! Form::select('customer_id', $select, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('lieu', 'Entrer le lieu : ') !!}
        {!! Form::text('lieu', null, ['class' => 'form-control', 'placeholder' => 'Lieu:']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('type', 'Entrer le type d\'événement : ') !!}
        {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Type:']) !!}
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

        <br>
        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}       

        {!! Form::close() !!}

        <a class='btn btn-secondary' href="{{route('index_event')}}"> Retour </a>
    </div>
</div>
@endsection
