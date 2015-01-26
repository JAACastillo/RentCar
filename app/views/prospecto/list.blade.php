@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Propectos</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
                <a href="{{ route('prospectoNuevo') }}" class="btn btn-default">
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
                    <th>Telefono</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($prospectos as $prospecto)
                <tr>
                    <td>
                        <a href="{{ route('prospectoShow', $prospecto->id) }}">{{ $prospecto->nombre }}</a>
                    </td>
                    <td>{{ $prospecto->telefono }}</td>
                    <td>{{ $prospecto->email }}</td>
                    <td>
                        <a href="{{ route('prospectoEditar', $prospecto->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                        <!-- <a href="#" data-id="{{ $prospecto->id }}" data-form="#form-prpt" data-content="Eliminar" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a> -->
                        <a href="{{ route('prospectoConvertir', $prospecto->id) }}" data-content="Convertir a cliente" data-placement="bottom" class="glyphicon glyphicon-transfer tool"> </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $prospectos->links() }}
        {{ Form::open(array('route' => array('prospectoDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-prpt')) }}
        {{ Form::close() }}
    </div>
</div>
@stop