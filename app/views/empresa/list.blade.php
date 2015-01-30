@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
           
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12">
                 <h1 class='text-center'>Empresas</h1>
                 @if(Auth::user()->empresa->id == 1)
                    <a href="{{ route('empresaNuevo') }}" class="btn btn-default">
                        <span class="glyphicon glyphicon-file"></span> Nuevo
                    </a>
                @endif
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr class="active">
                        <th>Empresa</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Opcion</th>
                    </tr>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->nombre }}</td>
                            <td>{{ $empresa->email }}</td>
                            <td>{{ $empresa->telefono }}</td>
                            <td>{{ $empresa->direccion }}</td>
                            <td>
                                 <a href="{{ route('empresaEditar', $empresa->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop