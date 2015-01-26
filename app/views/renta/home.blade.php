@extends('renta.template')

@section('titulo')
	Renta tu carro
@stop
@section('main')

<div id="slider">
	@include('renta.slider')				
</div>
<div id="main">
	<div class="clear"></div>
	@include('renta.pedido')
	<div id="primary">
		@include('renta.consejos')
		<div class="clear"></div>
	</div>
	@include('renta.boletin')
</div>


@stop