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
        {!! Form::select('customer_id', $select, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('products_list[]', 'Sélectionner les produits : ') !!}
            {!! Form::select('products_list[]', App\Product::pluck('nom', 'id'), null, ['class' => 'form-control', 'multiple' => 'true']) !!} 
        </div>

        {{-- <div class="form-group">
            {!! Form::label('couleur_id', 'Sélectionner une couleur : ') !!}
            {!! Form::select('couleur_id', $select_couleurs, null, ['class' => 'form-control']) !!}
        </div> --}}

        <div class="form-group mt-2">
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

        {!! Form::label('description', 'Description : ') !!}
        <textarea class="form-control" name="description" maxlength="350" rows="4" cols="50" placeholder="Vous pouvez ajouter ici des informations concernant l'événement."></textarea>

        <br>

        

        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary btn-sm', 'style' => 'float: right']) !!}       

        <a class='btn btn-secondary btn-sm' style="float: left" href="{{route('index_event')}}"> Retour </a>      

        {!! Form::close() !!}

</div>


    @section('javascripts')
    
    <script type="text/Javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        // var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        // modal.find('.modal-body input').val(recipient)
        })
    </script>
    @endsection

@endsection
