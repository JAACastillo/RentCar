@extends('prestamo/pasos')

@section('content_form')
<br/>

<br/>

<div class="row">

    <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos de la reserva</h3>
            </div>

            {{ Form::model($prestamo, $form_data) }}

                <div class="panel-body">
                @include('errores')
                    <div class="form-group">
                        {{ Form::label('', '', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <input type="checkbox" name="cobroPorHora" value="1"> Cobrar por hora
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('cliente_id', 'Nombre *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::select('cliente_id', $cliente, null, array('class' => 'form-control')); }}
                            @if($errors->has('cliente_id') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fechaReserva', 'Reserva *', array('id' => 'fechaReserva', 'class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fechaReserva', null, array('placeholder' => 'Fecha / Hora de Reserva', 'class' => 'form-control fechaReserva minDate')) }}
                            @if($errors->has('fechaReserva') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fechaDevolucion', 'Devolución *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-time"> </span>
                            {{ Form::text('fechaDevolucion', null, array('id' => 'fechaReserva', 'placeholder' => 'Fecha / Hora de Devolución', 'class' => 'form-control fechaDevolucion maxDate')) }}
                            @if($errors->has('fechaDevolucion') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('lugarEntrega_id', 'Lugar de Entrega *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"> </span>
                            {{ Form::select('lugarEntrega_id', $entrega, null, array('class' => 'form-control')); }}
                            @if($errors->has('lugarEntrega_id') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('', '', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <input type="checkbox" name="campoDevolver" id="campoDevolver" checked> Devolver en ubicación diferente
                        </div>
                    </div>

                    <div class="form-group" id='devolverLugar'>
                        {{ Form::label('lugarDevolucion_id', 'Lugar de Devolución', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"> </span>
                            {{ Form::select('lugarDevolucion_id', $devolucion, null, array('class' => 'form-control')); }}
                        </div>
                    </div>
                </div>

                <div class="panel-footer text-center">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

                </div>

            {{ Form::close() }}

        </div>

    </div>

</div>

@stop