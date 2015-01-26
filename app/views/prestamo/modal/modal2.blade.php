<div class="modal fade" id="crearPagare">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ $mensaje }}
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Datos Extas</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        {{ Form::model($prestamo, $form_data_2) }}
                            <div class="form-group">
                                {{ Form::label('conductor', 'Conductor *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                                <div class="col-md-7 col-sm-7 input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"> </span>
                                    {{ Form::select('conductor', $data, null); }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('valor', 'Valor de Reposición *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                                <div class="col-md-7 col-sm-7 input-group">
                                    <span class="input-group-addon glyphicon glyphicon-record"> </span>
                                    {{ Form::text('valor', null, array('placeholder' => 'Valor de Reposición', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            {{ Form::hidden('prestamo_id', null, array('id' => 'prestamo_id')) }}
                            {{ Form::submit('Guardar', array('class' => 'btn btn-default', 'id' => 'guardarPagare')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>