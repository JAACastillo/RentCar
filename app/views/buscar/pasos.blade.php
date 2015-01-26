@extends('index')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="text-center col-md-4 col-sm-4 @if($paso == 1) {{'active'}} @endif">
                    <a href="{{ route('buscarCliente') }}">
                        <span class="@if($paso == 1) glyphicon glyphicon-pencil @endif"> </span>
                        Clientes
                    </a>
                </li>
                <li class="text-center col-md-4 col-sm-4 @if($paso == 2) {{'active'}} @endif">
                    <a href="{{ route('buscarProspecto') }}">
                        <span class="@if($paso == 2) glyphicon glyphicon-pencil @endif"> </span>
                        Prospectos
                    </a>
                </li>
                <li class="text-center col-md-4 col-sm-4 @if($paso == 3) {{'active'}} @endif">
                    <a href="{{ route('buscarPrestamo') }}">
                        <span class="@if($paso == 3) glyphicon glyphicon-pencil @endif"> </span>
                        Alquileres
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @yield('content_form')
@stop