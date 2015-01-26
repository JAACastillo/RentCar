@extends('prestamo/pasos')
@section('content_form')
<br/>
<br/>
<div class="row">
    <div class="col-md-4 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forma de Pago</h3>
            </div>
            {{ Form::model($prestamo, $form_data) }}
                <div class="panel-body">
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('tipoPago', 'Tipo de pago *', array('class' => 'control-label ')) }}
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-th-list"> </span>
                            {{ Form::select('tipoPago', $tipoDePago, null, array('class' => 'form-control')); }}
                            @if($errors->has('tipoPago') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('descuento', 'Descuento', array('class' => 'control-label')) }}
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-sort"> </span>
                            {{ Form::text('descuento', null, array('placeholder' => 'Descuento', 'class' => 'form-control')) }}
                            @if($errors->has('descuento') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                </div>
                @if($prestamo->estado_id <= 4)
                    <div class="panel-footer text-center">
                        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
                    </div>
                @endif
            {{ Form::close() }}
        </div>
    </div>

    <div class="col-md-3">
        @include('prestamo.resumen')
    </div>
</div>
@stop