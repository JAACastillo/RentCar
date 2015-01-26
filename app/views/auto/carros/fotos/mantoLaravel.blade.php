 @extends('auto/carros/pasos')

@section('content_form')
{{ HTML::script('/assets/js/angular.min.js') }}
<br/>
<div class="row">

    <div class="col-md-6 col-sm-6 col-md-offset-2">

    <!-- <h1 class="text-center">Mantenimiento</h1> -->
    <hr>
    <hr>
        {{ Form::model($manto, $formData) }}
            <div class="form-group">
                {{ Form::label('placa_id', 'Numero placa *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                <div class="col-md-7 col-sm-7 input-group">
                    <span class="input-group-addon glyphicon glyphicon-tag"> </span>
                    {{ Form::select('placa_id', $carros, null) }}
                    @if($errors->has('placa_id') )
                        <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                    @endif
                </div>
            </div>
            <hr/>
             <div class="form-group">
                {{ Form::label('tipoMantenimiento_id', 'Carro *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                <div class="col-md-7 col-sm-7 input-group">
                    <span class="input-group-addon glyphicon glyphicon-tag"> </span>
                    {{ Form::select('tipoMantenimiento_id', $tipos, null) }}
                    @if($errors->has('tipoMantenimiento_id') )
                        <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fecha', 'Fecha *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                <div class="col-md-7 col-sm-7 input-group">
                    <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                    {{ Form::text('fecha', null, array('placeholder' => 'Fecha Inicio', 'class' => 'form-control datepicker minDate')) }}
                    @if($errors->has('fecha') )
                        <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('detalles', 'Fecha Inicio *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                <div class="col-md-7 col-sm-7 input-group">
                    <span class="input-group-addon glyphicon glyphicon-file"> </span>
                    {{ Form::textarea('detalles', null, array('placeholder' => 'Detalles del mantenimiento', 'class' => 'form-control', 'rows' => '3')) }}
                    @if($errors->has('detalles') )
                        <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                    @endif
                </div>
            </div>
            <hr>
                <p class="text-center">{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}</p>
            <hr>
        {{ Form::close() }}

    </div>

    <div class="col-md-3 col-sm-3 form-horizontal">

        <div class="panel panel-default">
            <div class="panel-heading text-center">
               <h4 class="panel-title">Matenimientos Anteriores</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr class="active">
                            <th>Tipo</th>
                            <th>Fecha </th>
                        </tr>                     

                    </table>

                </div>

            </div>
        </div>

    </div>

</div>

<br/>

@stop