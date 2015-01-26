@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Clientes</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
                <a href="{{ route('clienteNuevo') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Nombre</th>
                    <th>Documento Identidad</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($cliente as $clientes)
                <tr>
                    <td>
                        <a href="{{ route('clienteShow', $clientes->id) }}">{{ $clientes->nombre }}</a>
                    </td>
                    <td>{{ $clientes->doc_unico }}</td>
                    <td>{{ $clientes->email }}</td>
                    <td>
                        <a href="{{ route('clienteEditar', $clientes->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $cliente->links() }}
    </div>
</div>
@stop