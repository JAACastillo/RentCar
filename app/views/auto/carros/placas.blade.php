   
@extends('auto/carros/pasos')

@section('content_form')
<div class="row">
   <div class="col-md-6 col-sm-6 form-horizontal">
        {{Form::model($placa, $formData)}}
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Detalles del carro</h3>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('numero', 'Número *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('numero', null, array('placeholder' => 'Número de placa', 'class' => 'form-control')) }}
                            @if($errors->has('numero') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('kilometraje', 'Kilometraje', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('kilometraje', null, array('placeholder' => 'Kilometraje del Carro', 'class' => 'form-control')) }}
                            @if($errors->has('proveedor') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('proveedor', 'Proveedor', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('proveedor', null, array('placeholder' => 'Proveedor del Carro', 'class' => 'form-control')) }}
                            @if($errors->has('proveedor') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
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

                <div class="panel-footer text-center">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

                </div>
            </div>

        {{Form::close()}}
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Carros Registrados</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Número</td>
                        <td>Color</td>
                        <td>Proveedor</td>
                        <td>Kilometraje</td>
                        <td>Opcion</td>
                    </tr>
                    @foreach($placas as $placa)
                        <tr>
                            <td>{{$placa->numero}}</td>
                            <td>{{$placa->color->color}}</td>
                            <td>{{$placa->proveedor}}</td>
                            <td>{{$placa->kilometraje}}</td>
                            <td>
                                <a href="{{ route('placaEditar', $placa->id) }}" data-content="Editar"  class="glyphicon glyphicon-edit tool pull-left"> </a>
                                <a href="#" data-id="{{ $placa->id }}" data-form="#form-prt" data-content="Activar/Desactivar" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
{{ Form::open(array('route' => array('prestamoDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-prt')) }}
{{ Form::close() }}

@stop
            