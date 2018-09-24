@extends('layouts/templateAdmin')

@section('content')



<div class="container">

<h1 class="mt-3" >Ajout d'un produit</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => 'ProductController@store', 'files' => true]) !!}
        {{csrf_field()}}

        <div class="form-group">

        <br>
        {!! Form::label('nom', 'Entrer le nom : ') !!}
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
        <br>

        {!! Form::label('référence', 'Entrer la référence fournisseur : ') !!}
        {!! Form::text('reference', null, ['class' => 'form-control']) !!}
        <br>

        {!! Form::label('sexe', 'Sélectionner le sexe : ') !!}
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" value="homme" checked>
            <label class="form-check-label" >
                Homme
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" value="femme">
            <label class="form-check-label">
                Femme
            </label>
        </div>
        <br>
        <div class="form-group">
            {!! Form::label('tailles_list[]', 'Sélectionner les tailles disponibles  : ') !!}
            {!! Form::select('tailles_list[]', App\Taille::pluck('nom', 'id'), null, ['class' => 'form-control', 'multiple' => 'true']) !!} 
        </div>
        <br>

        <div class="form-group">
            {!! Form::label('couleurs_list[]', 'Sélectionner les couleurs disponibles  : ') !!}
            {!! Form::select('couleurs_list[]', App\Couleur::pluck('nom', 'id'), null, ['class' => 'form-control', 'multiple' => 'true']) !!} 
        </div>
        <br>

        <div class="form-group">
            {!! Form::label('zones_list[]', 'Sélectionner les zones disponibles  : ') !!}
            {!! Form::select('zones_list[]', App\Zone::pluck('nom', 'id'), null, ['class' => 'form-control', 'multiple' => 'true']) !!} 
        </div>
        <br>

        {!! Form::label('image', 'Ajouter une photo de profil: ') !!}
        {!! Form::file('image', array('class' => 'form-control')) !!}
        <br>

        {!! Form::label('Commentaires', 'Commentaires : ') !!}
        <textarea class="form-control" name="commentaires" maxlength="140" rows="4" cols="50"></textarea>

        <br>
        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}       

        {!! Form::close() !!}

        <a class='btn btn-secondary' href="{{route('index_product')}}"> Retour </a>
    </div>
</div>
@endsection
