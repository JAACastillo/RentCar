@extends('cliente/pasos')
@section('content_form')
    

<br/>
<br/>
<div class="row">
    {{ Form::model($conductor, $form_data) }}
        <div class="col-md-6 col-sm-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos del Conductor</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre Completo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::text('nombre', null, array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                             @if($errors->has('nombre') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', 'Teléfono *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-phone-alt"> </span>
                            {{ Form::text('telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control')) }}
                             @if($errors->has('telefono') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('documento', 'Doc. de Identidad', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('documento', null, array('placeholder' => 'Documento de Identidad', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('licencia', 'Número de Licencia *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('licencia', null, array('placeholder' => 'Número de Licencia', 'class' => 'form-control')) }}
                            @if($errors->has('licencia') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fechaLicencia', 'Fecha De Emisión *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fechaLicencia', null, array('placeholder' => 'Fecha Emisión / Licencia', 'class' => 'form-control datepicker')) }}
                            @if($errors->has('fechaLicencia') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fechaVencimiento', 'Fecha De Vencimiento *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fechaVencimiento', null, array('placeholder' => 'Fecha Vencimiento / Licencia', 'class' => 'form-control datepicker')) }}
                            @if($errors->has('fechaVencimiento') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    {{ Form::submit('Siguiente', array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        </div>
       <!--  <div class="col-md-6 col-sm-6 form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Subir Imagen</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label(null, 'Subir Imagen', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            @if(!empty($cliente->ruta_imagen))
                                <div class="thumbnail">
                                    <img class="img-responsive" src="{{ asset('assets/img/'.$cliente->ruta_imagen) }}" />
                                </div>
                            @endif
                            <input id="ruta_imagen" name="ruta_imagen" type="file">
                        </div>
                    </div>
                </div>
        
                <div class="panel-footer">
                    {{ Form::submit('Siguiente', array('class' => 'btn btn-default')) }}
                </div>
            </div>
             -->
        </div>
    {{ Form::close() }}
</div>
@stop