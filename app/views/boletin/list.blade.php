@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class='text-center'>Boletin</h1>
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
                        <th>Correo Electrónico</th>
                    </tr>
                    @foreach ($boletin as $boletins)
                        <tr>
                            <td>{{ $boletins->nombre }}</td>
                            <td>{{ $boletins->email }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="panel-footer"></div>
    </div>
@stop