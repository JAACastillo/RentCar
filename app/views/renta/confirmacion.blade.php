@extends('renta.template')
	
	@section('titulo')
		Confirmacion: Tu solicitud ha sido enviada
	@stop

	@section('main')
		<style>
			.ng-dirty .ng-invalid{border-color: red}
			.ng-dirty .ng-valid{border-color: green}
		</style>			
		<div id="main">				
			<div id="primary">	
				@include('renta.detalleConfirmacion')
			</div>	
		</div>
	@stop