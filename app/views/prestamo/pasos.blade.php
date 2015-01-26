@extends('index')
@section('content')
    <br/>

    <?php
        $pasos  = array(
                        array(
                            "label"  => "Fechas",
                            "enlace" => "prestamoEditar",
                            "paso"  => 1
                        ),
                        array(
                            "label" => "Carro",
                            "enlace" => "selectModelo",
                            "paso"  => 2
                        ),
                        array(
                            "label" => "Extras",
                            "enlace" => "selectExtras",
                            "paso"  => 3
                        ),
                        array(
                            "label" => "Pago",
                            "enlace" => "formaPago",
                            "paso"  => 5
                        ),
                        array(
                            "label" => "Contrato",
                            "enlace" => "prestamoContrato",
                            "paso"  => 6
                        ),
                        array(
                            "label" => "Devolver",
                            "enlace" => "prestamoRecibir",
                            "paso"  => 7
                        )
                    );
        $step = 1;
    ?>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                @foreach($pasos as $pass)
                    <li class="text-center col-md-2 @if($paso == $step) active @endif">
                        <a href="@if(($prestamo->estado_id + 1 >= $pass['paso'])) {{ route($pass['enlace'], $prestamo->id) }} @endif">
                            <span class="@if($paso == $step) glyphicon glyphicon-pencil @endif"> </span>
                            Paso {{$step}}: {{$pass['label']}}
                        </a>
                    </li> 
                    <?php $step++; ?>
                @endforeach
            </ul>
        </div>
    </div>
    @yield('content_form')
@stop