@extends('index')
@section('content')
<br/>
<div class="row" style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-7 col-sm-7">
        <h3>Prospectos</h3>
    </div>
    <div class="col-md-5 col-sm-5 text-right">
        <br/>
        <a href="{{ route('prospectoEditar', $prospecto->id) }}">Editar</a> |
        <a href="{{ route('prospectoList') }}" data-id="{{ $prospecto->id }}" data-form="#form-prpt" class="showBorrar">Borrar</a>
    </div>
</div>
<br/>
<div class="row" style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-6 col-sm-6">
        <dl class="dl-horizontal">
            <p>
                <dt class="text-left">{{ Form::label('Nombre:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->nombre) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Dirección:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->direccion) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Documento Identidad:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->doc_unico) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Sexo:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->sexo) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Correo Electrónico:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->email) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Nacimiento:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->fecha_nac) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Teléfono:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->telefono) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Celular:') }}</dt>
                <dd class="text-left">{{ Form::label($prospecto->celular) }}</dd>
            </p>
        </dl>
    </div>
    {{ Form::open(array('route' => array('prospectoDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-prpt')) }}
    {{ Form::close() }}
</div>
@stop