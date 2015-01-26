@extends('index')

@section('content')

<div class="row">

    <div class="col-md-12">

        <h1 class='text-center'>Extras / Servicios</h1>

    </div>

</div>

<div class="panel panel-default">

    <div class="panel-heading">

        <div class="row">

            <div class="col-md-12 col-sm-1">

            <p class="hidden-lg"></p>

               <a href="{{ route('extraNuevo') }}" class="btn btn-default">

                    <span class="glyphicon glyphicon-file"></span> Nuevo

                </a>

            </div>
        </div>

    </div>

    <div class="panel-body">

        <div class="table-responsive">

            <table class="table table-striped">

                <tr class="active">
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>opciones</th>
                </tr>

                @foreach ($extra as $extras)
                    <tr class="@if(!$extras->activo) danger @endif">
                        <td>
                            <img class="img-responsive" src="{{ asset('assets/img/'.$extras->imagen) }}" alt="foto del accesorio" width="40px" />
                        </td>
                        <td>
                            <a href="{{ route('extraEdit', array($extras->id)) }}">{{ $extras->nombre }}</a>
                        </td>
                        <td>{{ $extras->descripcion }}</td>
                        <td>${{ $extras->precio }}</td>
                        <td>
                            <a href="{{ route('extraEdit', array($extras->id)) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                            <a href="#" data-id="{{ $extras->id }}" data-form="#form-ext" data-content="Activar/Desactivar" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a>
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>

    </div>

    <div class="panel-footer">

        {{ $extra->links() }}

        {{ Form::open(array('route' => array('extraDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-ext')) }}

        {{ Form::close() }}

    </div>

</div>

@stop