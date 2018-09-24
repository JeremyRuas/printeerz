@extends('layouts/templateAdmin')

@section('content')

<div class="container">

<h1 class="mt-3" >Ajout d'une taille</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => 'TailleController@store']) !!}
        {{csrf_field()}}

        <div class="form-group">
        {!! Form::label('nom', 'Entrer la taille : ') !!}
        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Taille:']) !!}
        </div>
       
        <br>
        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}       

        {!! Form::close() !!}
        <br>

        <a class='btn btn-secondary ' href="{{route('index_product')}}"> Retour </a>
    </div>
</div>
@endsection
