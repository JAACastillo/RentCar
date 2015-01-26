@extends('auto/carros/pasos')

@section('content_form')
       
<br/>

<br/>

<div class="row"  ng-controller="carroController">
    {{ Form::model($carro, $form_data) }}
    

    <div class="panel-body" ng-init='modeloID = <?php echo $carro->modelo_id ?>'>

        <div class="col-md-6 col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Datos Generales</h3>
                </div>
                <input type="hidden" name="modelo_id" value="@{{modeloId.id}}" />
                <div class="panel-body">

                    <div class="form-group">
                        {{ Form::label('marca_id', 'Marca *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-tag"> </span>
                            {{ Form::select('marca_id', $marca, null, array('class' => 'form-control', 'ng-model'=>'marca','ng-change' => 'getModelos()')) }}
                            @if($errors->has('marca_id') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                     <!-- ng-options="modelo.nombre as modelo.nombre for modelo in modelos" -->

                    <div class="form-group">
                        {{ Form::label('modelo', 'Modelo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            <select class="form-control" 
                                    ng-model="modeloId" 
                                    ng-options="modelo as modelo.nombre for modelo in modelos track by modelo.id">
                                   
                            </select>
                            @if($errors->has('modelo_id') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('tipoCarro_id', 'Tipo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            {{ Form::select('tipoCarro_id', $tipo, null,  array('class' => 'form-control')) }}
                            @if($errors->has('tipoCarro_id') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('transmision', 'Transmisión *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::select('transmision', $transmision, null,  array('class' => 'form-control')) }}
                            @if($errors->has('transmision') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                   
                   <div class="form-group">
                       {{ Form::label('combustible_id', 'Tipo de Combustible *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                       <div class="col-md-7 col-sm-7 input-group">
                           <span class="input-group-addon glyphicon glyphicon-tint"> </span>
                            {{ Form::select('combustible_id', $combustibles, null,  array('class' => 'form-control')) }}
                           @if($errors->has('combustible_id') )
                               <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                           @endif
                       </div>
                   </div>
                   <div class="form-group">
                       {{ Form::label('color', 'Color', array('class' => 'control-label col-md-4 col-sm-4')) }}
                       <div class="col-md-7 col-sm-7 input-group">
                           <span class="input-group-addon glyphicon glyphicon-tint"> </span>
                           {{ Form::select('color_id', $colores, null,  array('class' => 'form-control')) }}
                           @if($errors->has('color_id') )
                               <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                           @endif
                       </div>
                   </div>   
                    <div class="form-group">
                        {{ Form::label('imagen', 'Imagen *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::file('imagen', array('class' => 'form-control')) }}
                            @if($errors->has('imagen') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>                 
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 form-horizontal">
        

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Detalles </h3>
                </div>

                <div class="panel-body">

                <div class="form-group">
                    {{ Form::label('proveedor', 'Proveedor ', array('class' => 'control-label col-md-4 col-sm-4')) }}
                    <div class="col-md-7 col-sm-7 input-group">
                        <span class="input-group-addon glyphicon glyphicon-time"> </span>
                        {{ Form::text('proveedor', null, array('placeholder' => 'Proveedor del carro', 'class' => 'form-control')) }}
                        @if($errors->has('proveedor') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('ano', 'Año *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                    <div class="col-md-7 col-sm-7 input-group">
                        <span class="input-group-addon glyphicon glyphicon-time"> </span>
                        {{ Form::text('ano', null, array('placeholder' => 'Año', 'class' => 'form-control')) }}
                        @if($errors->has('ano') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('motor', 'Motor *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                    <div class="col-md-7 col-sm-7 input-group">
                        <span class="input-group-addon glyphicon glyphicon-tasks"> </span>
                        {{ Form::text('motor', null, array('placeholder' => 'Motor', 'class' => 'form-control')) }}
                        @if($errors->has('motor') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('puertas', 'Puertas *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                    <div class="col-md-7 col-sm-7 input-group">
                        <span class="input-group-addon glyphicon glyphicon-record"> </span>
                        {{ Form::text('puertas', null, array('placeholder' => 'Numero de puertas', 'class' => 'form-control')) }}
                        @if($errors->has('puertas') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('capacidad', 'Capacidad *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                    <div class="col-md-7 col-sm-7 input-group">
                        <span class="input-group-addon glyphicon glyphicon-record"> </span>
                        {{ Form::text('capacidad', null, array('placeholder' => 'Capacidad', 'class' => 'form-control')) }}
                        @if($errors->has('capacidad') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('kmGalon', 'Kilómetro por galón *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                    <div class="col-md-7 col-sm-7 input-group">
                        <span class="input-group-addon glyphicon glyphicon-road"> </span>
                        {{ Form::text('kmGalon', null, array('placeholder' => 'Kilómetro por galón', 'class' => 'form-control')) }}
                        @if($errors->has('kmGalon') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('equipamiento', 'Equipamiento', array('class' => 'control-label col-md-4 col-sm-4')) }}
                    <div class="col-md-7 col-sm-7 input-group">
                        <span class="input-group-addon glyphicon glyphicon-briefcase"> </span>
                        {{ Form::text('equipamiento', null, array('placeholder' => 'Equipamiento', 'rows' => '3', 'class' => 'form-control')) }}
                        @if($errors->has('equipamiento') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                        @endif
                    </div>
                </div>            
            </div>
        </div>


        </div>


        <div class="panel-footer text-center">
            {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        </div>

    {{ Form::close() }}

</div>



@stop