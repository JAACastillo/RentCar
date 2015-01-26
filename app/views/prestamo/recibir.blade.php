@extends('prestamo/pasos')
@section('content_form')
<br/>
<div class="col-md-6 col-md-offset-2 text-center">
	<hr>

	@if($prestamo->estado_id == 6)
		<a href="{{route('prestamoRecibido', $prestamo->id)}}" class="btn btn-primary">Recibir Carro</a>
	@endif
	<hr>
	<a href="{{route('prestamoContratoImprimir', $prestamo->id)}}" target="_blank" class="btn btn-success">Ver Contrato</a>
	<hr>
	<a href="{{route('prestamoPagare', $prestamo->id)}}" target="_blank" class="btn btn-success">Ver Pagare</a>
	<hr/>
	<hr/>
</div>
<div class="col-md-3">
    @include('prestamo/resumen')
</div>
<br/>
@stop