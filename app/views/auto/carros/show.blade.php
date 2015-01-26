@extends('index')
@section('content')
<br/>
<div class="row"  style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-7 col-sm-7">
        <h3>Modelo del Auto</h3>
    </div>
    <div class="col-md-5 col-sm-5 text-right">
        <br/>
        <a href="{{ route('modeloEditar', $modelo->id) }}">Editar</a> |
        <a href="{{ route('modeloLista') }}" data-id="{{ $modelo->id }}" data-form="#form-mdl" class="showBorrar">Borrar</a>
    </div>
</div>
<br/>
<div class="row" style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-6 col-sm-6">
        <dl class="dl-horizontal">
            <p>
                <dt class='text-left'>{{ Form::label('Marca:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->marca->marca) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Tipo:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->tipo->tipo) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Modelo:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->modelo) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Año:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->año) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Motor:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->motor) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Transmisión:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->transmision) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Puertas:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->puertas) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Color:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->color) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Capacidad:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->capacidad) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Kilómetro/galón:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->km_galon) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Combustible:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->tipo_combustible) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Equipamiento:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->equipamiento) }}</dd>
            </p>
            <p>
                <dt class='text-left'>{{ Form::label('Existencias:') }}</dt>
                <dd class='text-left'>{{ Form::label($modelo->existencias) }}</dd>
            </p>
        </dl>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="col-md-12 col-sm-12">
            <dt class='text-left'>{{ Form::label('Tabla de Precios') }}</dt>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr class="active">
                        <th>Precio</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                    </tr>
                    @foreach ($precio as $precios)
                        <tr>
                            <td>${{ $precios->precio }}</td>
                            <td>{{ $precios->fecha_ini }}</td>
                            <td>{{ $precios->fecha_fin }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <br/>
            <dt class='text-left'>{{ Form::label('Imagenes del Auto') }}</dt>
            <div class="carousel slide">
                <div class="carousel-inner">
                    @foreach($galeria as $key => $galerias)
                        <div class="item @if($key == 0) {{ 'active' }} @endif">
                            <img alt='Fotocopia de la licencia' src='{{ asset("assets/img/$galerias->ruta_imagen") }}' class='img-responsive' />
                        </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#my_carusel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#my_carusel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    {{ Form::open(array('route' => array('modeloDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-mdl')) }}
    {{ Form::close() }}
</div>
@stop