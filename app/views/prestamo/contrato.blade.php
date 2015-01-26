@extends('prestamo/pasos')
@section('content_form')
<br/>
<div class="col-md-6 col-md-offset-2">
	@if($prestamo->conductor_id)
		<a href="{{route('prestamoContratoImprimir', $prestamo->id)}}" target="_blank" class="btn btn-success">Contrato</a>
		<a href="{{route('prestamoPagare', $prestamo->id)}}" target="_blank" class="btn btn-success">Pagare</a>
		<hr/>
	@endif
	{{ Form::model($prestamo, $formData) }}
	   	<div class="form-group">
           	{{ Form::label('conductor_id', 'Conductor *', array('class' => 'control-label col-md-4 col-sm-4')) }}
           	<div class="col-md-7 col-sm-7 input-group">
               	<span class="input-group-addon glyphicon glyphicon-home"> </span>
               	{{ Form::select('conductor_id', $conductores, null, array('class' => 'form-control')); }}
               	@if($errors->has('conductor_id') )
                   	<span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
               	@endif
           	</div>
       	</div>
		<hr/>
	   	<div class="form-group">
           	{{ Form::label('placa_id', 'Número de placa*', array('class' => 'control-label col-md-4 col-sm-4')) }}
           	<div class="col-md-7 col-sm-7 input-group">
               	<span class="input-group-addon glyphicon glyphicon-home"> </span>
               	{{ Form::select('placa_id', $placas, null, array('class' => 'form-control')); }}
               	@if($errors->has('placa_id') )
                   <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
               	@endif
           	</div>
       	</div>
	    <div class="form-group">
	        {{ Form::label('valorReposicion', 'Valor de Reposición *', array('class' => 'control-label col-md-4 col-sm-4')) }}
	        <div class="col-md-7 col-sm-7 input-group">
	            <span class="input-group-addon glyphicon glyphicon-record"> </span>
	            {{ Form::text('valorReposicion', null, array('placeholder' => 'Valor de Reposición', 'class' => 'form-control')) }}
	             @if($errors->has('valorReposicion') )
                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                @endif
	        </div>
	    </div>

	    <hr/>
	    <div class="form-group text-center">
	    	{{ Form::submit('Guardar', array('class' => 'btn btn-primary', 'id' => 'guardarContrato')) }}
	    </div>
	    <hr/>
	{{ Form::close() }}
</div>
<div class="col-md-3">
    @include('prestamo/resumen')
</div>
<br/>
@stop