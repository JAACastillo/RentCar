   
@extends('cliente/pasos')

@section('content_form')
<div class="row">
   <div class="col-md-6 col-sm-6 form-horizontal">
        {{Form::model($documento, $formData)}}
            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">Documento</h3>

                </div>

                <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('tipoDocumento_id', 'Tipo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-user"> </span>
                                {{ Form::select('tipoDocumento_id', $tipoDocumentos, null, array('class' => 'form-control')); }}
                                @if($errors->has('tipoDocumento_id') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('numero', 'Número *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                                {{ Form::text('numero', null, array('placeholder' => 'Número de numero', 'class' => 'form-control')) }}
                                @if($errors->has('numero') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('emision', 'Emisión', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                                {{ Form::text('emision', null, array('placeholder' => 'Fecha Emisión', 'class' => 'form-control datepicker')) }}
                                @if($errors->has('emision') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('vencimiento', 'Vencimiento *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                                {{ Form::text('vencimiento', null, array('placeholder' => 'Fecha Vencimiento', 'class' => 'form-control datepicker')) }}
                                @if($errors->has('vencimiento') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                        {{ Form::label('imagen', 'Imagen', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::file('imagen') }}
                            @if($errors->has('imagen') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div> 
                </div>

                <div class="panel-footer">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}

                </div>
            </div>

        {{Form::close()}}
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Documentos registrados</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Tipo</td>
                        <td>Número</td>
                        <td>Vencimiento</td>
                        <td>Opcion</td>
                    </tr>
                    @foreach($documentos as $documento)
                        <tr>
                            <td>{{$documento->tipo->tipo}}</td>
                            <td>{{$documento->numero}}</td>
                            <td>{{$documento->vencimiento}}</td>
                            <td>{{$documento->imagen}}</td>
                            <td>
                                <a href="{{ route('editarDocumento', $documento->id) }}" data-content="Editar"  class="glyphicon glyphicon-edit tool pull-left"> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@stop
            