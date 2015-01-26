@extends('index')
@section('content')

<div class="col-md-4 col-md-offset-3" >
	<a class="btn btn-success" href="{{route('prestamoConfirmar', $prestamo->id)}}">Confirmar Reserva</a>
	@include('prestamo.resumen')
</div>

@stop