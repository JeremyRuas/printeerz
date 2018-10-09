@extends('layouts/templateFront')


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
        <div class="col lg-4">
            <h1>CECI EST LA PAGE FRONT </h1>
        </div>
    
        <div class="col lg-8">
            <canvas id="my_canvas" width="100%" style="background: url('/img/blank_t.jpg'); width='100%';">
            </canvas>
        </div>
    </div>
</div>

@section('javascripts')
<script>
    var canvas = document.getElementById("my_canvas");
    var ctx = canvas.getContext("2d");
    ctx.moveTo(0,0);
    ctx.lineTo(200,100);
    ctx.stroke();
</script>
@endsection