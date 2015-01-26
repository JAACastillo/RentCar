@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Prestamos</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
                <p class="hidden-lg"></p>
                <a href="{{ route('prestamoNuevo') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Cliente</th>
                    <th>Modelo</th>
                    <th>Horario de Reserva</th>
                    <th>Horario de Devolución</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($prestamos as $prestamo) 
                    <tr class="@if($prestamo->cancelado) danger @endif">
                        <td>
                            @if(!is_null($prestamo->cliente)) 
                                {{ $prestamo->cliente['nombre'] }}
                            @endif
                        </td>
                        <td>
                            @if(!empty($prestamo->carro_id))
                                {{ $prestamo->carro->modelo->nombre }}
                            @endif
                        </td>
                        <td>{{ $prestamo->fechaReserva }}</td>
                        <td>{{ $prestamo->fechaDevolucion }}</td>
                        <td>$ {{ $prestamo->valor }}</td>
                        <td>
                          <a href="{{route($prestamo->estado->url, $prestamo->id)}}" data-content="{{$prestamo->estado->popUpText}}" data-placement="bottom" class="tool"> 
                            {{ $prestamo->estado->nombre }}
                            </a>
                        </td>
                        <td>
                            @if($prestamo->estado_id < 7 && !$prestamo->cancelado)
                                <a href="{{route('prestamoEditar', $prestamo->id)}}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                                
                            @endif
                            <a href="#" data-id="{{ $prestamo->id }}" data-form="#form-prt" data-content="Cancelar Prestamo" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $prestamos->links() }}
        {{ Form::open(array('route' => array('prestamoDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-prt')) }}
        {{ Form::close() }}
    </div>
</div>
@stop