@extends('index')
@section('content')
    <br/>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="text-center col-md-offset-1 col-md-2 @if($paso == 1 || $paso == 6) {{'active'}} @endif">
                    <a href="@if($paso != 1) {{ route('clienteEditar',$cliente->id) }} @endif">
                        <span class="@if($paso == 1 || $paso == 6) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 1: Datos del cliente
                    </a>
                </li>
                <li class="text-center col-md-2 @if($paso == 2) {{'active'}} @endif">
                    <a href="@if($paso > 2) {{ route('clienteContacto',$cliente->id) }} @endif">
                        <span class="@if($paso == 2) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 2: En Caso De Emergencia
                    </a>
                </li>
                <li class="text-center col-md-2 @if($paso == 3) {{'active'}} @endif">
                    <a href="@if($paso >= 2) {{ route('clienteAdicional',$cliente->id) }} @endif">
                        <span class="@if($paso == 3) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 3: Conductor Adicional
                    </a>
                </li>
                <li class="text-center col-md-2 @if($paso == 4) {{'active'}} @endif">
                    <a href="@if($paso >= 2) {{ route('clienteInformacion',$cliente->id) }} @endif">
                        <span class="@if($paso == 4) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 4: Documentos
                    </a>
                </li>
                <li class="text-center col-md-2 @if($paso == 5) {{'active'}} @endif">
                    <a href="@if($paso >= 2) {{ route('clienteComentario',$cliente->id) }} @endif">
                        <span class="@if($paso == 5) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 5: Comentarios
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @yield('content_form')
@stop