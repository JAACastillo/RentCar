<div class="row">
        {{ Form::model($cliente, $form_data) }}

        <div class="col-md-6 col-sm-6 col-md-offset-3">
            <div class="panel panel-default ">
                <div class="panel-heading text-center" >
                    <h3 class="panel-title">Datos Generales</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('tipo', 'Tipo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::select('tipo', $tipo, null, array('class' => 'form-control')); }}
                            @if($errors->has('tipo') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::text('nombre', Input::old('nombre'), array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                            @if($errors->has('nombre') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', 'Dirección *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"> </span>
                            {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección Local', 'rows' => '3', 'class' => 'form-control')) }}
                            @if($errors->has('direccion') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                  <!--   <div class="form-group">
                        {{ Form::label('direccion_2', 'Dirección 2', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"> </span>
                            {{ Form::textarea('direccion_2', null, array('placeholder' => 'Dirección en el Extrangero', 'rows' => '3', 'class' => 'form-control')) }}
                            @if($errors->has('direccion_2') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div> -->

                  <hr/>

                    <div class="form-group">
                        {{ Form::label('fechaNacimiento', 'Fecha De Nacimiento', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fechaNacimiento', null, array('placeholder' => 'Fecha de nacimiento', 'class' => 'form-control datepicker')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('sexo', 'Sexo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::select('sexo', $sexo, null, array('class' => 'form-control')); }}
                            @if($errors->has('sexo') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        {{ Form::label('email', 'Correo Electrónico', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-envelope"> </span>
                            {{ Form::text('email', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}

                            @if($errors->has('email') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', 'Teléfono Local *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-phone-alt"> </span>
                            {{ Form::text('telefono', null, array('placeholder' => 'Teléfono Local', 'class' => 'form-control')) }}
                            @if($errors->has('telefono') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">

                        {{ Form::label('celular', 'Celular', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-phone"> </span>

                            {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}

                        </div>

                    </div>

                    
                    <div class="form-group">
                        {{ Form::label('telefonoExtranjero', 'Teléfono del Extrangero', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-phone-alt"> </span>
                            {{ Form::text('telefonoExtranjero', null, array('placeholder' => 'Teléfono del Extrangero', 'class' => 'form-control')) }}
                        </div>
                    </div>
                </div><div class="panel-footer text-center">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

                </div>

            </div>

        </div>

        {{-- Datos del Contacto--}}
        </div>

    {{ Form::close() }}

</div>