@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class='text-center'>Usuarios</h1>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12 col-sm-1">
                <p class="hidden-lg"></p>
                    <a href="{{ route('usuarioNuevo') }}" class="btn btn-default">
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
                        <th>Correo Electrónico</th>
                        <th>Tipo de usuario</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($user as $users)
                        <tr>
                            <td>{{ $users->nombre }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->tipo }}</td>
                            <td>
                                <a href="{{ route('usuarioEditar', $users->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                                <a href="#" data-id="{{ $users->id }}" data-form="#form-usr" data-content="Eliminar" data-placement="bottom" class="glyphicon glyphicon-trash tool"></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="panel-footer">
            {{ $user->links() }}
            {{ Form::open(array('route' => array('usuarioDesactivar', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-usr')) }}
            {{ Form::close() }}
        </div>
    </div>
@stop