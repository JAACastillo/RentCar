@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Modelos de Autos</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
               <a href="{{ route('carroNuevo') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($carros as $carro)
                    <tr>
                        @if(!empty($carro->modelo->marca->nombre))
                            <td>{{ $carro->modelo->marca->nombre }}</td>
                        @endif
                        <td>
                            <a href="{{ route('carros', $carro->id) }}">{{ $carro->modelo->nombre }}</a>
                        </td>
                        @if(!empty($carro->tipo->nombre))
                            <td>{{ $carro->tipo->nombre }}</td>
                        @endif
                        <td>
                            {{$carro->ano}}
                        </td>
                        <td>
                            <a href="{{ route('carroEditar', $carro->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $carros->links() }}
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-md-12">
         @include('/cliente/modal/show')
    </div>
</div>
@stop