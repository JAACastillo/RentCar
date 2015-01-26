@extends('prestamo/pasos')
@section('content_form')

<br/>
<br/>

<div class="col-md-9">
    @foreach ($extras as $extra)
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-3 col-sm-3">
                <img class="img-responsive" src="{{ asset('assets/img/'.$extra->imagen) }}" alt="foto del accesorio" width="80px" />
            </div>
            <div class="col-md-2 text-justify">
                {{ Form::label($extra->nombre) }}
            </div>
            <div class="col-md-3 col-sm-4 text-justify">
                {{ Form::label($extra->descripcion) }}
            </div>
            <div class="col-md-2 col-sm-2 text-justify">
                <a href="{{ route('prestamoExtra', array($prestamo->id, $extra->id)) }}" class="btn btn-primary" style="font-size:2em; padding:0.1em 1em;">
                   $ {{ $extra->precio}}
                </a>
            </div>
           
        </div>
        <br>
    @endforeach
</div>
<div class="col-md-3">
    @include('prestamo/resumen')
</div>
<br/>
@stop