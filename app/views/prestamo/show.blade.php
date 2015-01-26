@extends('index')
@section('content')
<br/>
<br/>
<div class="row" >
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-10 col-sm-10 col-xs-10">
                <h4>Cliente</h4>
            </div>
            <div class="col-md-2 col-sm-2 hidden-lg col-xs-2 hidden-sm">
                <a href="{{ route('prestamoEditar', array($prestamo->id)) }}">Editar</a>
            </div>
        </div>
        <br/>
        <dl class="horizontal">
            <dd class='text-justify'><span class="glyphicon glyphicon-user"> </span> {{ Form::label('Nombre: ' . $prestamo->cliente->nombre) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-envelope"> </span> {{ Form::label('Correo Eléctronico: ' . $prestamo->cliente->email) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-phone-alt"> </span> {{ Form::label('Teléfono: ' . $prestamo->cliente->telefono) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-phone"> </span> {{ Form::label('Celular: ' . $prestamo->cliente->celular) }}</dd>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-10 col-sm-10">
                <h4>Reserva</h4>
            </div>
            <div class="col-md-2 col-sm-2 hidden-lg hidden-xs">
                <a href="{{ route('prestamoEditar', array($prestamo->id)) }}">Editar</a>
            </div>
        </div>
        <dl class="horizontal">
            <br/>
            <dd class='text-justify'><span class="glyphicon glyphicon-calendar"> </span> {{ Form::label('Fecha / Hora Reserva: ' . $prestamo->horario_rsv) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label('Fecha / Hora de Devolución: ' . $prestamo->horario_dvl) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-home"> </span> {{ Form::label('Lugar de Entrega: ' . $prestamo->lugarEntrega->nombre) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-home"> </span> {{ Form::label('Lugar de Devolución: ' . $prestamo->lugarDevolucion->nombre) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-credit-card"> </span> {{ Form::label('Tipo de Pago: ' . $prestamo->tipo_pago) }}</dd>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-10 col-sm-4">
                <h4>Total</h4>
            </div>
            <div class="col-md-2 col-sm-12 hidden-sm hidden-xs">
                <a href="{{ route('prestamoEditar', array($prestamo->id)) }}">Editar</a>
            </div>
        </div>
        <dl class="horizontal">
            <br/>
            </dl>
    </div>
</div>
<br/>
<div class="row" >
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-12 col-sm-12">
                <h4>Datos</h4>
            </div>
        </div>
        <dl class="horizontal">
            <br/>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> Modelo: {{$prestamo->carro->modelo->nombre}}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> Año: {{$prestamo->carro->ano}}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-tasks"> </span> Motor: {{$prestamo->carro->motor}}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> Transmisión: {{$prestamo->carro->transmision}} </dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> Puertas: {{$prestamo->carro->puertas}} </dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> Color: {{$prestamo->carro->color->color}}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> Pasajeros: {{$prestamo->carro->pasajeros}}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-road"> </span> KM/G: {{$prestamo->carro->kmGalon}}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> Combustible: {{$prestamo->carro->combustible->nombre}}
            <dd class='text-justify'><span class="glyphicon glyphicon-briefcase"> </span> Equipamiento: {{$prestamo->carro->equipamiento}}</dd>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-12 col-sm-12">
                <h4>Extras</h4>
            </div>
        </div>
        <br/>
        @if(!empty($data))
        <div class="form-group">
            <div class="input-group">
                <dl class="horizontal">
                    @foreach ($data as $value)
                        <dd class='text-left'><span class="glyphicon glyphicon-record"> </span> {{ $value->extra }} ${{ $value->precio }}</dd>
                    @endforeach
                </dl>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-offset-3 col-md-6 col-sm-12">
        <dl class="horizontal prestamoAccesorio"></dl>
    </div>
</div>
@stop