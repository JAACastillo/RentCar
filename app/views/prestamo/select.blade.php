@extends('prestamo/pasos')

@section('content_form')
<br/>
<br/>
<div class="col-md-9">
    @foreach ($carros as $carro)
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <dl class="horizontal">
                <div class="col-md-3 text-center">
                    <h2>{{$carro->modelo->marca->nombre}}</h2>
                    <h5>{{$carro->modelo->nombre}}</h5>
                </div>
                <div class="col-md-3 col-sm-3 ">
                    <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label('Año: ' . $carro->ano) }}</dd>
                    <dd class='text-justify'><span class="glyphicon glyphicon-tasks"> </span> {{ Form::label('Motor: ' . $carro->motor) }}</dd>
                    <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label('Transmisión: ' . $carro->transmision) }}</dd>
                    <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($carro->puertas . ' Puertas') }}</dd>
                </div>

                <div class="col-md-3 col-sm-3">
                    <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> {{ Form::label('Color: ' . $carro->color->color) }}</dd>
                    <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($carro->capacidad . ' Pasajeros') }}</dd>
                    <dd class='text-justify'><span class="glyphicon glyphicon-road"> </span> {{ Form::label($carro->kmGalon . ' Km/g') }}</dd>
                    <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> {{ Form::label('Combustible: ' . $carro->combustible->nombre) }}</dd>
                    <dd class='text-justify'><span class="glyphicon glyphicon-briefcase"> </span> {{ Form::label('Equipamiento: ' . $carro->equipamiento) }}</dd>
                </div>

                <div class="col-md-3 col-sm-3"> 
                    <a href="{{ route('prestamoCarro', array($prestamo->id, $carro->id, $carro->precio)) }}" class="btn btn-primary" style="font-size:2em; padding:0.1em 1em;">
                       $ {{ $carro->precio}}
                    </a>
                </div>

            </dl>

        </div>
    <br>
    @endforeach
    <br/>
    <br/>

    <div class="row">
        <div class="col-md-2 col-sm-5">
            {{ $carros->links() }}
        </div>
    </div>
</div>
<div class="col-md-3">
    @include('prestamo.resumen')
</div>

@stop