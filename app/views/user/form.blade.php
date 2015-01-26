@extends('index')
@section('content')
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Nuevo Usuario</h3>
                </div>
                {{ Form::model($user, $form_data) }}
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre Completo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-font"> </span>
                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                                @if( $errors->has('nombre') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Correo Electrónico *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-envelope"> </span>
                                {{ Form::text('email', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
                                @if( $errors->has('email') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Contraseña *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-qrcode"> </span>
                                {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
                                @if( $errors->has('password') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Confirmar Contraseña *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-qrcode"> </span>
                                {{ Form::password('password_confirmation', array('placeholder' => 'Confirmar Contraseña', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tipo', 'Tipo de usuario *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-user"> </span>
                                {{ Form::select('tipo', $data, null, array('class' => 'form-control')) }}
                                @if( $errors->has('tipo') )
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