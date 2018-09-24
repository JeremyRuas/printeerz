@extends('layouts/templateAdmin')

@section('content')


<div class="container">

<h1 class="mt-3" >Modification d'une couleur</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {!! Form::open(['action' => array('CouleurController@update', 'id' => $couleur->id), 'files' => true]) !!}

        {{csrf_field()}}
        <div class="form-group">
        {!! Form::label('nom', 'Entrer la couleur : ') !!}
        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Couleur:']) !!}
        </div>
        <input type="hidden" class="form-control" name="actual_nom" value= '{{ $couleur->nom }}'>

        <br>
        {!! Form::submit('Modifer', ['class' => 'btn btn-primary btn-sm']) !!}       

        {!! Form::close() !!}

        <a class='btn btn-secondary btn-sm' href="{{route('index_product')}}"> Retour </a>
    </div>
</div>
@endsection