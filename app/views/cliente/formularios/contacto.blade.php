@extends('cliente/pasos')

@section('content_form')
        <script type="text/javascript">
            if(history.forward(1))
                location.replace(history.forward(1))
        </script>
    <br/>

    <br/>

    <div class="row">

        <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">Datos del Contacto</h3>

                </div>

                {{ Form::model($emergencia, $form_data) }}

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

                            {{ Form::label('direccion', 'Dirección  *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                            <div class="col-md-7 col-sm-7 input-group">

                                <span class="input-group-addon glyphicon glyphicon-home"> </span>

                                {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección', 'rows' => '3', 'class' => 'form-control')) }}

                                @if($errors->has('direccion'))

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

                    </div>

                    <div class="panel-footer">

                        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

                    </div>

                {{ Form::close() }}

            </div>

        </div>

    </div>

@stop