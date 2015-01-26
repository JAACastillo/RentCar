@extends('index')
@section('content')

<div class="row">
	<div class="col-md-9">
		@include('inicio.calendario')
	</div>
	<div class="col-md-3">
		<div class="row">
			@include('inicio.cumple')			
		</div>
		<div class="row">
			@include('inicio.accesosDirectos')
		</div>
		
	</div>
</div>
@stop