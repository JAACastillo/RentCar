@extends('index')
@section('content')
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Registrar Empresa</h3>
                </div>
                {{ Form::model($empresa, $form_data) }}
                    <div class="panel-body">
                        @include('errores')
                        <div class="form-group">
                            {{ Form::label('nombre', 'Empresa *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-font"> </span>
                                {{ Form::text('nombre', null, array('placeholder' =>'Nombre de empresa', 'class' => 'form-control')) }}
                                @if( $errors->has('nombre') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Correo Electrónico *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-envelope"> </span>
                                {{ Form::text('email', null, array('placeholder' => 'Correo Electronico', 'class' => 'form-control')) }}
                                @if( $errors->has('email') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('telefono', 'Telefono *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-qrcode"> </span>
                                {{ Form::text('telefono',null, array('placeholder' => 'Numero de telefono', 'class' => 'form-control')) }}
                                 @if( $errors->has('telefono') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('direccion', 'Dirección *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-user"> </span>
                                {{ Form::text('direccion', null, array('placeholder' => 'Direccion completa', 'class' => 'form-control')) }}
                                @if( $errors->has('direccion') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('imagen', 'Logo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-user"> </span>
                                {{ Form::file('imagen', array('class' => 'form-control')) }}
                                @if( $errors->has('logo') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop