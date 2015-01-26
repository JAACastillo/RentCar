@extends('cliente/pasos')

@section('content_form')
    <br/>

    <br/>
@include('errores')
    <div class="row">

        <div class="col-md-6 col-sm-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h3 class="panel-title">Comentarios</h3>

                </div>
                <div class="list-group">

                    @foreach($comentarios as $comment)
                      <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$comment->texto}}</h4>
                        <p class="list-group-item-text">{{$comment->created_at}}</p>
                      </a>
                    @endforeach
                </div>

                {{ Form::model($comentario, $form_data) }}

                    <div class="panel-body">

                        <div class="form-group col-md-12 col-sm-12">


                            <div class="input-group">

                                <span class="input-group-addon glyphicon glyphicon-file"> </span>

                                {{ Form::textarea('texto', null, array('placeholder' => 'Escribe el comentario para el cliente', 'rows' => '3', 'class' => 'form-control')) }}
                                @if($errors->has('texto') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>

                        </div>
                        @if($errors->has('Cliente_id') )
                            <span class="input-group-addon glyphicon glyphicon-remove alert-danger">clie </span>
                        @endif
                    </div>

                    <div class="panel-footer text-center">

                        {{ Form::submit('Guardar Comentario', array('class' => 'btn btn-primary')) }}

                    </div>

                {{ Form::close() }}

            </div>

        </div>

    </div>

@stop