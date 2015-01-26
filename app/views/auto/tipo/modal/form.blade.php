<div class="modal fade" id="crearTipo">
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
                <h4 class="modal-title">Tipo del Auto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        {{ Form::model($tipo, $form_data) }}
                            <div class="form-group">
                                {{ Form::label('tipo', 'Tipo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                                <div class="col-md-7 col-sm-7 input-group">
                                    <span class="input-group-addon glyphicon glyphicon-record"> </span>
                                    {{ Form::text('tipo', null, array('placeholder' => 'Tipo', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            {{ Form::hidden('tipo_id', null, array('id' => 'tipo_id')) }}
                            {{ Form::submit('Guardar', array('class' => 'btn btn-default', 'id' => 'guardarTipo')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>