@extends('index')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <ul class="nav nav-tabs">
                <li class="text-center col-md-3 col-sm-3 @if($paso == 1 || $paso == 4) {{'active'}} @endif">
                    <a href="@if($paso != 1) {{ route('carroEditar',$carro->id) }} @endif">
                        <span class="@if($paso == 1 || $paso == 4) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 1: Datos Generales 
                    </a>
                </li>
                <li class="text-center col-md-3 col-sm-3 @if($paso == 2) {{'active'}} @endif">
                    <a href="@if($paso > 2) {{ route('carroPlacas',$carro->id) }} @endif">
                        <span class="@if($paso == 2) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 2: Detalles Carros
                    </a>
                </li>
                <li class="text-center col-md-3 col-sm-3 @if($paso == 3) {{'active'}} @endif">
                    <a href="@if($paso >= 2) {{ route('carroPrecios',$carro->id) }} @endif">
                        <span class="@if($paso == 3) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 3: Precios
                    </a>
                </li>
                <li class="text-center col-md-3 col-sm-3 @if($paso == 5) {{'active'}} @endif">
                    <a href="@if($paso >= 2) {{ route('carroManto',$carro->id) }} @endif">
                        <span class="@if($paso == 5) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 3: Mantenimientos
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @yield('content_form')
@stop