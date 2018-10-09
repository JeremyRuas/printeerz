@extends('layouts/templateAdmin')

@section('content')

<div class="container">

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
        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary btn-sm', 'style' => 'float: right']) !!}       

        <a class='btn btn-secondary btn-sm' style="float: left" href="{{route('index_product')}}"> Retour </a>

        {!! Form::close() !!}
        <br>
    </div>
</div>
@endsection
