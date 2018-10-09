@extends('layouts/templateAdmin')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col row">
            <div id="scrollbarProduct" class="col-lg-3 mt-3">
                @if($product->color1_coeur_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2" id="img_color1_coeur_imageName" title="Couleur n°1 - Zone 'Coeur'" width="100%" src="/uploads/{{$product->color1_coeur_imageName}}" alt="Image produit"></div>
                @endif
                @if($product->color1_FAV_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2"  id="img_color1_FAV_imageName" title="Couleur n°1 - Zone 'Face avant'" width="100%" src="/uploads/{{$product->color1_FAV_imageName}}" alt="Image produit"></div>
                @endif
                @if($product->color1_FAR_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2"  id="img_color1_FAR_imageName" title="Couleur n°1 - Zone 'Face arrière'" width="100%" src="/uploads/{{$product->color1_FAR_imageName}}" alt="Image produit"></div>
                @endif
                @if($product->color2_coeur_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2"  id="img_color2_coeur_imageName" title="Couleur n°2 - Zone 'Coeur'" width="100%" src="/uploads/{{$product->color2_coeur_imageName}}" alt="Image produit"></div>
                @endif
                @if($product->color2_FAV_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2"  id="img_color2_FAV_imageName" title="Couleur n°2 - Zone 'Face avant'" width="100%" src="/uploads/{{$product->color2_FAV_imageName}}" alt="Image produit"></div>
                    @endif
                @if($product->color2_FAR_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2" id="img_color2_FAR_imageName" title="Couleur n°2 - Zone 'Face arrière'"width="100%" src="/uploads/{{$product->color2_FAR_imageName}}" alt="Image produit"></div>
                    @endif   
                @if($product->color3_coeur_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2" id="img_color3_coeur_imageName" title="Couleur n°3 - Zone 'Coeur'" width="100%" src="/uploads/{{$product->color3_coeur_imageName}}" alt="Image produit"></div>
                    @endif
                @if($product->color3_FAV_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2" id="img_color3_FAV_imageName" title="Couleur n°3 - Zone 'Face avant'"width="100%" src="/uploads/{{$product->color3_FAV_imageName}}" alt="Image produit"></div>
                    @endif
                @if($product->color3_FAR_imageName != NULL)
                    <div><img class="side_img mb-2 mt-2" id="img_color3_FAR_imageName" title="Couleur n°3 - Zone 'Face arrière'"width="100%" src="/uploads/{{$product->color3_FAR_imageName}}" alt="Image produit"></div> 
                @endif
            </div>
        <div class="col-lg-9">
            @if($product->imageName != NULL)
            <br>
                <div class="image_principale">
                    <img  id="image_principale" width="100%" title="image principale" src="/uploads/{{$product->imageName}}" alt="Image produit">
                    <span id="image_principale_legend">
                            <script>$('.element').attr('id'); </script>
                    </span>
                </div>
            @else
            <br>
                <div class="image_principale"><img id="image_principale" title="image par défaut" width="100%" src="/img/tee-shirt-blanc-gildan.jpg" alt="img_default"></div>
            @endif
        </div>
    </div>

        <div class="col-lg-5 ml-3">
            <h3 class="mt-3">#{{ $product->id . ' ' .ucfirst($product->nom) }}</h3>
            <hr>

            <h6 class="mb-2">Sexe: <small>{{ ucfirst($product->sexe) }}</small></h6>

            <h6 class="mb-2">Référence fournisseur: <small>{{ $product->reference }}</small></h6>

            <?php $list_tailles = $product->tailles->pluck('nom')->toArray();?>
            <h6 class="mb-2">Tailles disponibles: <small><?php echo implode(', ', $list_tailles); ?></small></h6>
            
                @foreach($couleurs as $couleur)
                    @if($couleur->id == $product->color1)
                        <h4 class="mt-3">Couleur n°1:  {{ $couleur->nom }}</h4>
                            @if($product->color1_coeur)
                                <div>Zone "Coeur"
                                @if($product->color1_coeur_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color1_coeur_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color1_coeur_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color1_coeur_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color1_coeur_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif
                            @endif
                            @if($product->color1_FAV)
                                <div>Zone "Face avant"
                                @if($product->color1_FAV_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color1_FAV_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color1_FAV_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color1_FAV_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color1_FAV_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif
                            @endif
                            @if($product->color1_FAR)
                                <div>Zone "Face arrière"
                                @if($product->color1_FAR_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color1_FAR_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color1_FAR_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color1_FAR_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color1_FAR_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif 
                            @endif
                    @endif
                @endforeach

                @foreach($couleurs as $couleur)
                    @if($couleur->id == $product->color2)
                        <h4 class="mt-3">Couleur n°2:  {{ $couleur->nom }}</h4>
                        @if($product->color2_coeur)
                            <div>Zone "Coeur"
                            @if($product->color2_coeur_gabarit == '6')
                                <small>avec un Gabarit 1</small>
                            @elseif($product->color2_coeur_gabarit == '7')
                                <small>avec un Gabarit 2</small>
                            @elseif($product->color2_coeur_gabarit == '8')
                                <small>avec un Gabarit 3</small>
                            @elseif($product->color2_coeur_gabarit == '9')
                                <small>avec un Gabarit 4</small>
                            @elseif($product->color2_coeur_gabarit == '10')
                                <small>avec un Gabarit 5</small>
                            </div>
                            @endif
                        @endif
                            @if($product->color2_FAV)
                                <div >Zone "Face avant"
                                @if($product->color2_FAV_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color2_FAV_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color2_FAV_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color2_FAV_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color2_FAV_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif
                            @endif
                            @if($product->color2_FAR)
                                <div >Zone "Face arrière"
                                @if($product->color2_FAR_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color2_FAR_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color2_FAR_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color2_FAR_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color2_FAR_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif
                            @endif
                    @endif
                @endforeach
            
                @foreach($couleurs as $couleur)
                    @if($couleur->id == $product->color3)
                        <h4 class="mt-3">Couleur n°3: {{ $couleur->nom }}</h4>
                        @if($product->color3_coeur)
                                <div >Zone "Coeur"
                                    @if($product->color3_coeur_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color3_coeur_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color3_coeur_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color3_coeur_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color3_coeur_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif
                            @endif
                            @if($product->color3_FAV)
                                <div>Zone "Face avant"
                                @if($product->color3_FAV_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color3_FAV_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color3_FAV_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color3_FAV_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color3_FAV_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif
                            @endif
                            @if($product->color3_FAR)
                                <div>Zone "Face arrière"
                                @if($product->color3_FAR_gabarit == '6')
                                    <small>avec un Gabarit 1</small>
                                @elseif($product->color3_FAR_gabarit == '7')
                                    <small>avec un Gabarit 2</small>
                                @elseif($product->color3_FAR_gabarit == '8')
                                    <small>avec un Gabarit 3</small>
                                @elseif($product->color3_FAR_gabarit == '9')
                                    <small>avec un Gabarit 4</small>
                                @elseif($product->color3_FAR_gabarit == '10')
                                    <small>avec un Gabarit 5</small>
                                </div>
                                @endif
                            @endif
                        @endif
                    
                @endforeach
            <?php //$list_couleurs = $product->couleurs->pluck('nom')->toArray();?>

            <div><?php //echo implode(', ', $list_couleurs); ?></div>
            
            <h5 class="mt-3">Description: </h5>

            @if(strlen($product->description) != 0)
                <div>{{ $product->description }}</div>
            
            @else
                <td>{{ '...' }}</td>
            @if (!$product->imageName)
                <div><i>(image par défault)</i></div>
            @endif
            
            @endif
            

            <a role="button" class='btn btn-success btn-sm mt-2' onclick="return confirm('Êtes-vous sûr?')" href="{{route('edit_product', $product->id)}}" title="Modification du produit"> <i class="uikon">edit</i> Modifier</a>
            <a role="button" class='btn btn-danger btn-sm mt-2' onclick="return confirm('Êtes-vous sûr?')" href="{{route('destroy_product', $product->id)}}" title="Suppression du produit">Supprimer</a>
            <a class='btn btn-secondary btn-sm mt-2' href="{{route('index_product')}}"> Retour </a>
            <hr>
        </div>
    </div> 

    {{-- <div class="row">
        <div class="col-lg-3">
            <div class="your-class mt-4">
                @if($product->coeur_imageName != NULL)
                    <div><img width="100%"  src="/uploads/{{ $product->coeur_imageName }}" alt="Zone d'impression du produitt"></div>  
                @endif
                
                @if($product->face_avant_imageName != NULL)
                    <div><img width="100%"  src="/uploads/{{ $product->face_avant_imageName }}" alt="Zone d'impression du produitt"></div>
                @endif

                @if($product->face_arriere_imageName != NULL)
                    <div><img width="100%"  src="/uploads/{{ $product->face_arriere_imageName }}" alt="Zone d'impression du produitt"></div>
                @endif
            </div>  
            <br><br>
        </div>
            <div class="col"></div>
    </div> --}}
</div>

    @section('javascripts')
    <script> var host = "{{URL::to('/')}}"; </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $('.your-class').slick();
    });
    </script>
    <script>
        $('.side_img').on('click', function(){
            swap(this)
        })
    function swap(img) {
        var tmp = img.src;
        img.src = document.getElementById('image_principale').src;
        document.getElementById('image_principale').src = tmp;

        var tmp2 = img.title;
        img.title = document.getElementById('image_principale').title;
        document.getElementById('image_principale').title = tmp2;
  }
    </script>
    {{-- <script type="text/javascript">
        $('.image_principale').each(function() {
        $(this).after( $(this).attr('title') ); 
        });
        </script> --}}
    @endsection

@endsection