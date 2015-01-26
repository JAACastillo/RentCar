@extends('buscar/pasos')
@section('content_form')
<br/>
<br/>
<style type="text/css">
    .oculto {
        display: none;
    }
</style>
<div class="row">
    <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Buscar Prospecto</h3>
            </div>
            {{ Form::open(array('url' => '/busqueda', 'method' => 'post')) }}
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('campo', 'Campo', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-inbox"> </span>
                            {{ Form::select('campo', $data, null); }}
                        </div>
                    </div>
                    <div class="form-group texto_1">
                        {{ Form::label('texto_1', 'Texto', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-search"> </span>
                            {{ Form::text('texto_1', null, array('placeholder' => 'Texto', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group texto_2 oculto">
                        {{ Form::label('texto_2', 'Texto', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('texto_2', null, array('placeholder' => 'Texto', 'class' => 'form-control datepicker')) }}
                        </div>
                    </div>
                    {{ Form::hidden('tabla', 'prospecto') }}
                </div>
                <div class="panel-footer">
                    {{ Form::submit('Buscar', array('class' => 'btn btn-default')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop