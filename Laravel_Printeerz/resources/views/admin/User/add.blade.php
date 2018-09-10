@extends('layouts/templateAdmin')

@section('content')



<div class="container">

<h1 class="mt-3" >Ajout d'un utilisateur</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => 'UserController@store', 'files' => true]) !!}
        {{csrf_field()}}
        <div class="form-group">

        {!! Form::label('prenom', 'Entrer le prénom : ') !!}
        {!! Form::text('prenom', null, ['class' => 'form-control']) !!}

        {!! Form::label('nom', 'Entrer le nom : ') !!}
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}

        {!! Form::label('email', 'Entrer le mail : ') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}

        {!! Form::label('password', 'Entrer le mot de passe : ') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}

        {!! Form::label('password_confirmation', 'Confirmer le mot de passe : ') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

        {!! Form::label('role', 'Selectionner le rôle : ') !!}
        <div class="form-check">
            <input class="form-check-input" type="radio" name="role" value="opérateur" checked>
            <label class="form-check-label" for="exampleRadios1">
                Opérateur
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="role" value="technicien">
            <label class="form-check-label" for="exampleRadios2">
                Technicien
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="role" value="admin">
            <label class="form-check-label" for="exampleRadios2">
                Admin
            </label>
        </div>

        {!! Form::label('image', 'Ajouter une photo de profil: ') !!}
        {!! Form::file('image', array('class' => 'form-control')) !!}
        <br>
        
        <!--<div class="form-check">
            <input class="form-check-input" type="radio" name="isAdmin" id="isAdmin_radio" value="0" checked>
            <label class="form-check-label" for="exampleRadios1">
                Utilisateur
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="isAdmin" id="isAdmin_radio" value="1">
            <label class="form-check-label" for="exampleRadios2">
                Administrateur
            </label>
        </div>-->
        <br>
        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}       

        {!! Form::close() !!}

        <a class='btn btn-secondary' href="{{route('user_index')}}"> Retour </a>
    </div>
</div>
@endsection