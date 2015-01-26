@extends('index')
@section('content')
<br/>
<div class="row"  style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-7 col-sm-7">
        <h3>Extra / Servicio</h3>
    </div>
    <div class="col-md-5 col-sm-5 text-right">
        <br/>
        <p class="hidden-lg"></p>
        <a href="{{ route('extra.edit', array($extra->id)) }}">Editar</a> |
        <a href="{{ route('extra.index') }}" data-id="{{ $extra->id }}" data-form="#form-ext" class="showBorrar">Borrar</a>
    </div>
</div>
<br/>
<div class="row" style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-6 col-sm-6">
        <dl class="dl-horizontal">
            <p>
                <dt class="text-left">{{ Form::label('Extra:') }}</dt>
                <dd class="text-left">{{ Form::label($extra->extra) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Descripción:') }}</dt>
                <dd class="text-left">{{ Form::label($extra->descripcion) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Precio:') }}</dt>
                <dd class="text-left">$ {{ Form::label($extra->precio) }}</dd>
            </p>
        </dl>
    </div>
    @if($extra->ruta_imagen != '')
        <div class="col-md-6 col-sm-6">
            <div class="col-md-12 col-sm-12">
                <img class="img-responsive" src="{{ asset('assets/img/'.$extra->ruta_imagen) }}" alt="Imagen del extra"/>
            </div>
        </div>
    @endif
    {{ Form::open(array('route' => array('extra.destroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-ext')) }}
    {{ Form::close() }}
</div>
<br/>
@stop