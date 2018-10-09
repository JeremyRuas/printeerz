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
    <div class="row">
        <div class="col">
            {!! Form::open(['action' => 'ProductController@store', 'files' => true]) !!}
                {{csrf_field()}}
            <!--~~~~~~~~~~~___________NOM__________~~~~~~~~~~~~-->
            <div class="form-group">
                {!! Form::label('nom', 'Entrer le nom : ', ['class' => 'mt-2']) !!}
                {!! Form::text('nom', null, ['class' => 'form-control']) !!}
            </div>

            <!--~~~~~~~~~~~___________REFERENCE__________~~~~~~~~~~~~-->
            <div class="form-group">
                {!! Form::label('référence', 'Entrer la référence fournisseur : ') !!}
                {!! Form::text('reference', null, ['class' => 'form-control']) !!}
            </div>

            <!--~~~~~~~~~~~___________SEXE__________~~~~~~~~~~~~-->
            <div class="form-group">
                {!! Form::label('sexe', 'Sélectionner le sexe : ') !!}
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" value="Homme" checked>
                    <label class="form-check-label" >
                        Homme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" value="Femme">
                    <label class="form-check-label">
                        Femme
                    </label>
                </div>
            </div>
        
            <!--~~~~~~~~~~~___________PHOTO PRINCIPALE__________~~~~~~~~~~~~-->
            <div class="form-group mt-2">
                {!! Form::label('image', 'Ajouter une photo de profil: ') !!}
                {!! Form::file('image', array('class' => 'form-control')) !!}
            </div>

            <!--~~~~~~~~~~~___________TAILLES__________~~~~~~~~~~~~-->
            <div class="form-group mt-2">
                {!! Form::label('tailles_list[]', 'Sélectionner les tailles disponibles  : ') !!}
                {!! Form::select('tailles_list[]', App\Taille::pluck('nom', 'id'), null, ['class' => 'form-control', 'multiple' => 'true']) !!} 
            </div>

            {!! Form::label('description', 'Description : ') !!}
            <textarea class="form-control" name="description" maxlength="350" rows="4" cols="50" placeholder="Vous pouvez ajouter ici une description concernant le produit."></textarea>
    
    <hr>
        
                <!--~~~~~~~~~~~___________COLOR1__________~~~~~~~~~~~~-->
            <div id="img_add_product" class="mb-8">
                <div class="input-group mt-2">
                    {!! Form::select('color1', $select_couleurs, null, ['class' => 'form-control mb-1', 'id' => 'select_color1', 'placeholder' => '********************* Choisissez votre couleur n°1 *********************']) !!}                  
                
                <!--~~~~~~~~~~~___________Modal ajout Couleur en AJAX__________~~~~~~~~~~~~-->
                    <span class="input-group-btn"><button type="button" class="btn btn-success ml-1 mt-1" data-toggle="modal" style="float:right" data-target="#exampleModal"><i class="uikon">add</i></button></span>
                </div>

                <!--~~~~~~~~~~~___________CHOIX ZONES COLOR1__________~~~~~~~~~~~~-->
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="color1_FAV" class="form-check-input" id="checkbox_FAV_color1">
                    <label class="form-check-label" for="exampleCheck1">Face avant</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="color1_coeur" class="form-check-input" id="checkbox_coeur_color1">
                    <label class="form-check-label" for="exampleCheck1">Coeur</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="color1_FAR" class="form-check-input" id="checkbox_FAR_color1">
                    <label class="form-check-label" for="exampleCheck1">Face arrière</label>
                </div>

                <!--~~~~~~~~~~~___________IMAGES COLOR1__________~~~~~~~~~~~~-->
                <div class="form-group mb-2 mt-2">
                    {!! Form::label('color1_FAV_image', 'Ajouter une photo pour la face avant: ', array('class' => 'color1_FAV_image')) !!}
                    {!! Form::file('color1_FAV_image', array('class' => 'color1_FAV_image form-control mb-2 mt-2', 'id' => 'color1_FAV_image')) !!}
                    {!! Form::select('color1_FAV_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color1_FAV_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la face avant ***']) !!}
                </div>
                <div class="form-group mb-2">
                    {!! Form::label('color1_coeur_image', 'Ajouter une photo pour la zone du coeur: ', array('class' => 'color1_coeur_image')) !!}
                    {!! Form::file('color1_coeur_image', array('class' => 'color1_coeur_image form-control mb-2 mt-2')) !!}
                    {!! Form::select('color1_coeur_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color1_coeur_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la zone coeur ***']) !!}
                </div>
                <div class="form-group mb-2 mt-2">
                    {!! Form::label('color1_FAR_image', 'Ajouter une photo pour la face arrière: ', array('class' => 'color1_FAR_image')) !!}
                    {!! Form::file('color1_FAR_image', array('class' => 'color1_FAR_image form-control mb-2 mt-2')) !!}
                    {!! Form::select('color1_FAR_gabarit', $select_gabarits, null, ['class' => 'form-control mb-8', 'id' => 'select_color1_FAR_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la face arrière ***']) !!}
                </div>
            </div>
            <br><br>
           
            <!--~~~~~~~~~~~___________COLOR2__________~~~~~~~~~~~~-->     
            <div id="img_add_product">   
            <div class="input-group mt-2 mb-8">
                    {!! Form::select('color2', $select_couleurs, null, ['class' => 'form-control mb-1', 'id' => 'select_color2', 'placeholder' => '********************* Choisissez votre couleur n°2 *********************']) !!}
                
                <!--~~~~~~~~~~~___________Modal ajout Couleur en AJAX__________~~~~~~~~~~~~-->
                    <span class="input-group-btn"><button type="button" style="float:right" class="btn btn-success ml-1 mt-1" data-toggle="modal" data-target="#exampleModal"><i class="uikon">add</i></button></span>
                </div>

                <!--~~~~~~~~~~~___________CHOIX ZONES COLOR2__________~~~~~~~~~~~~-->
            <div class="form-check form-check-inline">
                <input type="checkbox" name="color2_FAV" class="form-check-input" id="checkbox_FAV_color2">
                <label class="form-check-label" for="exampleCheck1">Face avant</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="color2_coeur" class="form-check-input" id="checkbox_coeur_color2">
                <label class="form-check-label" for="exampleCheck1">Coeur</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="color2_FAR" class="form-check-input" id="checkbox_FAR_color2">
                <label class="form-check-label" for="exampleCheck1">Face arrière</label>
            </div>

            <!--~~~~~~~~~~~___________IMAGES COLOR2__________~~~~~~~~~~~~-->
             <div class="form-group mb-2 mt-2">
                {!! Form::label('color2_FAV_image', 'Ajouter une photo pour la face avant: ', array('class' => 'color2_FAV_image')) !!}
                {!! Form::file('color2_FAV_image', array('class' => 'color2_FAV_image form-control mb-2 mt-2')) !!}
                {!! Form::select('color2_FAV_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color2_FAV_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la face avant ***']) !!}
            </div>
            
            <div class="form-group mb-2">
                {!! Form::label('color2_coeur_image', 'Ajouter une photo pour la zone du coeur: ', array('class' => 'color2_coeur_image')) !!}
                {!! Form::file('color2_coeur_image', array('class' => 'color2_coeur_image form-control mb-2 mt-2')) !!}
                {!! Form::select('color2_coeur_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color2_coeur_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la zone coeur ***']) !!}
                </div>
                
            <div class="form-group mb-2 mt-2">
                {!! Form::label('color2_FAR_image', 'Ajouter une photo pour la face arrière: ', array('class' => 'color2_FAR_image')) !!}
                {!! Form::file('color2_FAR_image', array('class' => 'color2_FAR_image form-control mb-2 mt-2')) !!}
                {!! Form::select('color2_FAR_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color2_FAR_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la face arrière ***']) !!}
            </div>
        </div>
        <br><br>
        
            <!--~~~~~~~~~~~___________COLOR3__________~~~~~~~~~~~~-->
        <div id="img_add_product">
            <div class="input-group mt-2">
                {!! Form::select('color3', $select_couleurs, null, ['class' => 'form-control mb-1', 'id' => 'select_color3', 'placeholder' => '********************* Choisissez votre couleur n°3 *********************']) !!}
                
            <!--~~~~~~~~~~~___________Modal ajout Couleur en AJAX__________~~~~~~~~~~~~-->
                <span class="input-group-btn"><button type="button" style="float:right" class="btn btn-success mt-1 ml-1" data-toggle="modal" data-target="#exampleModal"><i class="uikon">add</i></button></span>
            </div>
           
            <!--~~~~~~~~~~~___________CHOIX ZONES COLOR3__________~~~~~~~~~~~~-->
            <div class="form-check form-check-inline">
                <input type="checkbox" name="color3_FAV" class="form-check-input" id="checkbox_FAV_color3">
                <label class="form-check-label" for="exampleCheck1">Face avant</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="color3_coeur" class="form-check-input" id="checkbox_coeur_color3">
                <label class="form-check-label" for="exampleCheck1">Coeur</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="color3_FAR" class="form-check-input" id="checkbox_FAR_color3">
                <label class="form-check-label" for="exampleCheck1">Face arrière</label>
            </div>
            
            <!--~~~~~~~~~~~___________IMAGES COLOR3__________~~~~~~~~~~~~-->
            <div class="form-group mb-2 mt-2">
                {!! Form::label('color3_FAV_image', 'Ajouter une photo pour la face avant: ', array('class' => 'color3_FAV_image')) !!}
                {!! Form::file('color3_FAV_image', array('class' => 'color3_FAV_image form-control mb-2 mt-2')) !!}
                {!! Form::select('color3_FAV_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color3_FAV_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la face avant ***']) !!}
            </div>
            
            <div class="form-group mb-2">
                {!! Form::label('color3_coeur_image', 'Ajouter une photo pour la zone du coeur: ', array('class' => 'color3_coeur_image')) !!}
                {!! Form::file('color3_coeur_image', array('class' => 'color3_coeur_image form-control mb-2 mt-2')) !!}
                {!! Form::select('color3_coeur_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color3_coeur_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la zone coeur ***']) !!}
                </div>
                
            <div class="form-group mb-2 mt-2">
                {!! Form::label('color3_FAR_image', 'Ajouter une photo pour la face arrière: ', array('class' => 'color3_FAR_image')) !!}
                {!! Form::file('color3_FAR_image', array('class' => 'color3_FAR_image form-control mb-2 mt-2')) !!}
                {!! Form::select('color3_FAR_gabarit', $select_gabarits, null, ['class' => 'form-control mb-1', 'id' => 'select_color3_FAR_gabarit', 'placeholder' => '*** Choisissez le gabarit pour la face arrière ***']) !!}
            </div>
        </div>
        
            
            <!--~~~~~~~~~~~___________DESCRIPTION__________~~~~~~~~~~~~-->
           
        <div>
            <br>
            

            {!! Form::submit('Ajouter', ['class' => 'btn btn-primary btn-sm mt-2 mb-2', 'style' => 'float: right']) !!}       

            <a class='btn btn-secondary btn-sm mt-2 mb-2' style="float: left" href="{{route('index_product')}}"> Retour </a>

            {!! Form::close() !!}
        </div>
            <!--~~~~~~~~~~~___________MODAL__________~~~~~~~~~~~~-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouvelle couleur</h5>
                        @if (session('status'))
                            <div class="alert alert-success mt-1 mb-2">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            {!! Form::open(['id' => 'AddColorAjax']) !!}
                            <input type="hidden" name="select_couleurs" id="select_couleurs" value="{{ serialize($select_couleurs) }}">
                        <div class="form-group">
                            {{Form::text('nom', null, array('class'=>'form-control', 'placeholder' => 'Ajouter une couleur', 'id'=>'nom', 'name'=>'nom'))}}
                        </div>
                        {{ Form::submit('Valider', array('name'=>'submit',  'class'=>'btn btn-primary btn-sm', 'id' => 'submit_modal', 'onclick' => "this.value='Ajoutée'")) }}  
                        {{Form::close()}}
                    </div>
                    <div class="modal-footer">
                        <button id="close_modal" type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
     @section('javascripts')
    {{-- <script type="text/javascript">
        $("select[name='select_zone']").change(function(){
        var value = $(this).val();
        $("input#optionOutput").val(value);
        });
    </script>  --}}
    <script type="text/Javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        //var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        //modal.find('.modal-body input').val(recipient)
        });
    </script>
        <!--~~~~~~~~~~~___________SCRIPT ANIMATION INPUT IMAGE SELON ZONE SELECT__________~~~~~~~~~~~~-->
    <script>
        
    /*$(document).ready(function(){
        for(i=1; i<4; i++) {
            $('.color' + i + '_FAV_image').fadeOut();
            $('.color' + i + '_FAR_image').fadeOut();
            $('.color' + i + '_coeur_image').fadeOut();
        }
        $('#checkbox_FAV_color1').change(function(){
            if(this.checked)
                $('.color1_FAV_image').fadeIn('slow');
            else
                $('.color1_FAV_image').fadeOut('slow');
        });
        $('#checkbox_FAV_color2').change(function(){
            if(this.checked)
                $('.color2_FAV_image').fadeIn('slow');
            else
                $('.color2_FAV_image').fadeOut('slow');
        });
        $('#checkbox_FAV_color3').change(function(){
            if(this.checked)
                $('.color3_FAV_image').fadeIn('slow');
            else
                $('.color3_FAV_image').fadeOut('slow');
        });
        $('#checkbox_FAR_color1').change(function(){
            if(this.checked)
                $('.color1_FAR_image').fadeIn('slow');
            else
                $('.color1_FAR_image').fadeOut('slow');
        });
        $('#checkbox_FAR_color2').change(function(){
            if(this.checked)
                $('.color2_FAR_image').fadeIn('slow');
            else
                $('.color2_FAR_image').fadeOut('slow');
        });
        $('#checkbox_FAR_color3').change(function(){
            if(this.checked)
                $('.color3_FAR_image').fadeIn('slow');
            else
                $('.color3_FAR_image').fadeOut('slow');
        });
        $('#checkbox_coeur_color1').change(function(){
            if(this.checked)
                $('.color1_coeur_image').fadeIn('slow');
            else
                $('.color1_coeur_image').fadeOut('slow');
        });
        $('#checkbox_coeur_color2').change(function(){
            if(this.checked)
                $('.color2_coeur_image').fadeIn('slow');
            else
                $('.color2_coeur_image').fadeOut('slow');
        });
        $('#checkbox_coeur_color3').change(function(){
            if(this.checked)
                $('.color3_coeur_image').fadeIn('slow');
            else
                $('.color3_coeur_image').fadeOut('slow');
        });
    });*/
    </script>
    @endsection
@endsection