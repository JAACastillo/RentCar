@extends('index')

@section('content')

    <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row text-center"> 
                    <h4 class="panel-title">Color</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    @include('errores')
                    <div class="col-md-8 col-sm-12">
                        {{ Form::model($color,array('class' => 'form-horizontal')) }}

                            <div class="form-group">
                                {{ Form::label('color', 'Color *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                                <div class="col-md-7 col-sm-7 input-group">
                                    <span class="input-group-addon glyphicon glyphicon-record"> </span>
                                    {{ Form::text('color', null, array('placeholder' => 'Color', 'class' => 'form-control')) }}
                                    {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>

@stop