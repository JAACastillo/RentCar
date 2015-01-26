@extends('auto/carros/pasos')

@section('content_form')
<br/>

<div class="row">

    <div class="col-md-6 col-sm-6">

        {{ Form::model($precio, $form_data) }}

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">Precios</h3>

                </div>

                <div class="panel-body">

                    <div class="form-group">
                        {{ Form::label('cantidad', 'Precio *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>
                            {{ Form::text('cantidad', null, array('placeholder' => 'Precio', 'class' => 'form-control')) }}
                            @if($errors->has('cantidad') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fechaInicio', 'Fecha Inicio *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fechaInicio', null, array('placeholder' => 'Fecha Inicio', 'class' => 'form-control datepicker minDate')) }}
                            @if($errors->has('fechaInicio') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fechaFin', 'Fecha Fin *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fechaFin', null, array('placeholder' => 'Fecha Fin', 'class' => 'form-control datepicker maxDate')) }}
                            @if($errors->has('fechaFin') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="panel-footer text-center">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

                </div>

            </div>

        {{ Form::close() }}

    </div>

    <div class="col-md-6 col-sm-6 form-horizontal">

        <div class="panel panel-default">
            <div class="panel-heading text-center">
               <h4 class="panel-title">Precios Registrados</h4>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr class="active">
                            <th>Precio</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Acciones</th>
                        </tr>

                        @foreach ($precios as $precio)
                            <tr>
                                <td>$ {{ $precio->cantidad }}</td>
                                <td>{{ $precio->fechaInicio }}</td>
                                <td>{{ $precio->fechaFin }}</td>
                                <td>
                                    <a href="{{ route('precioEditar', $precio->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>

            </div>
        </div>

    </div>

</div>

<br/>

@stop