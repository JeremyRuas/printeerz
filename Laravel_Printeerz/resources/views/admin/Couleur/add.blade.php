@extends('layouts/templateAdmin')

@section('content')

<div class="container">

<h1 class="mt-3" >Ajout d'une couleur</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => 'CouleurController@store', 'files' => true]) !!}
        {{csrf_field()}}

        <div class="form-group">
        {!! Form::label('nom', 'Entrer la couleur : ') !!}
        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Couleur:']) !!}
        </div>
       
        <br>
        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}       

        {!! Form::close() !!}
        <br>

        <a class='btn btn-secondary ' href="{{route('index_customer')}}"> Retour </a>
    </div>
</div>
@endsection
