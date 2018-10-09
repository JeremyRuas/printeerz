@extends('layouts/templateAdmin')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="your-class mt-4">
                @if($event->logoName != NULL)
                    <div><img width="100%"  src="/uploads/{{$event->logoName}}" alt="Image évenement"></div>
                @else
                    <div><img width="100%"  src="/img/No_photo.jpg" alt="img_default"></div>
                @endif

                @if($event->coeur_imageName != NULL)
                    <div><img width="100%"  src="/uploads/{{ $event->coeur_imageName }}" alt="Zone d'impression de l'évenement"></div>  
                @endif
                
                @if($event->face_avant_imageName != NULL)
                    <div><img width="100%"  src="/uploads/{{ $event->face_avant_imageName }}" alt="Zone d'impression de l'évenement"></div>
                @endif

                @if($event->face_arriere_imageName != NULL)
                    <div><img width="100%"  src="/uploads/{{ $event->face_arriere_imageName }}" alt="Zone d'impression de l'évenement"></div>
                @endif
            </div>  
        </div>

        <div class="col">
        <h2 class="mt-3">#{{ $event->id . ' ' . $event->nom }}</h2>
        <hr>

        {{-- <h5 class="mt-3">sIdentifiant: #{{ $event->id }}</h5> --}}

        <h5 class="mt-3">Annonceur: </h5>
        <div>{{ $event->annonceur }}</div>
        
        <h5 class="mt-3">Client: </h5>
        @if($event->customer)
        <div>{{ $event->customer->denomination}}</div>
        @else
        <div><i>Inconnu</i></div>
        @endif

        <h5 class="mt-3">Produits sélectionnés: </h5>
        <?php $list_products = $event->products->pluck('nom')->toArray();?>

        <div><?php echo implode(', ', $list_products); ?></div>


        <h5 class="mt-3">Lieu: </h5>
        <div>{{ $event->lieu }}</div>

        <h5 class="mt-3">Type d'événement: </h5>
        <div>{{ $event->type }}</div>

        <h5 class="mt-3">Date: </h5>
        <div>{{ date('d-m-Y', strtotime($event->date)) }}</div>
        
        <h5 class="mt-3">description: </h5>

        @if(strlen($event->description) != 0)
        <div>{{ $event->description }}</div>
        <br>
        @else
        <td>{{ '...' }}</td>
        @if (!$event->logoName)
        <div><i>(logo par défault)</i></div>
        @endif
        <br>
        @endif
        <br>

        <a role="button" class='btn btn-success btn-sm' href="{{route('edit_event', $event->id)}}"  title="Modification du produit"><i class="uikon">edit</i> Modifier</a>
        <a role="button" class='btn btn-danger btn-sm' href="{{route('destroy_event', $event->id)}}" onclick="return confirm('Êtes-vous sûr?')" title="Suppression du produit">Supprimer</a>
        <a class='btn btn-secondary btn-sm' href="{{route('index_event')}}"> Retour </a>
        
    </div>
</div>
<hr>
<section id="comments">
<div class="container">
        <input type="hidden" id="_token" value="{{ csrf_token() }}">

    @foreach($event->comments as $comment)
    <?php //dd($comment)  ?>
    <div class="" id="{{ $comment->id }}">
        <div class="row"> 
            <div class="col-3">
            <?php //dd($comment->user)  ?>
            @if($comment->user->imageName)
            <div><img src="/uploads/{{$comment->user->imageName}}" class="miniRoundedImage" alt="img_profile" >
            @else
            <div><img src="/uploads/no_image.jpg" class="miniRoundedImage" style="no-repeat center" alt="img_profile" >
            @endif
               {{ $comment->user->prenom . ' ' . $comment->user->nom }} <br>(<small>{{ date('Y-m-d H:i:s', strtotime($comment->created_at)) }}</small>)</div>
                <!-- <div class="event_comments_list1"></div> -->
                
            </div>
            <div class="col">
                {{ $comment->name }}
                <hr>
                {{ $comment->message }}
                <br>
                @if(Auth::user()->role == 'admin')
                <button class="delete_comment btn btn-danger btn-sm"  data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}" style="float:right"> Supprimer </button>
                @endif
                <!-- <div class="event_comments_list2"></div> -->
            </div>
        </div>
        <br><br>
    </div>
    @endforeach

            <div class="event_comments_list1"></div>
            <div class="event_comments_list2"></div>

</div>
</section>
<br>

<!-- ~~~~~~~~ Commentaires Events ~~~~~~~~ -->
    
{!! Form::open(['id' => 'commentForm']) !!}
{{csrf_field()}}
    <input type="hidden" name="event_id" id="event_id" value="{{ $event->id }}">
    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="user_prenom" id="user_prenom" value="{{ Auth::user()->prenom }}">
    <input type="hidden" name="user_nom" id="user_nom" value="{{ Auth::user()->nom }}">

        <div class="row">
            <div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
                {{Form::label('name', 'Objet')}}
                {{Form::text('name', null, array('class'=>'form-control', 'id'=>'name', 'name'=>'name'))}}
            </div>
            <div class="inner col-xs-12 col-sm-12 col-md-12 form-group">
                {{Form::label('message', 'Commentaire')}}
                {{Form::textarea('message', null, array('class'=>'form-control', 'id'=>'message', 'name'=>'message', 'rows'=>'5'))}}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 submit form-group">
                {{Form::submit('Commenter', array('name'=>'submit', 'class'=>'btn btn-orange'))}}
            </div>
        </div>
{{ Form::close() }}
</div>

    @section('javascripts')
    <script> var host = "{{URL::to('/')}}"; </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $('.your-class').slick();
    });
    </script>
    @endsection
    
@endsection