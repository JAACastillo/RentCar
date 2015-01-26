@extends('cliente/pasos')

@section('content_form')
        <script type="text/javascript">
            if(history.forward(1))
                location.replace(history.forward(1))
        </script>
<br/>

<br/>

<div class="row">

    <div class="col-md-6 col-sm-6">

        {{ Form::model($imagen, $form_data) }}

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">Subir Imagen</h3>

                </div>

                <div class="panel-body">

                    <div class="form-group">

                        @if(Session::has('mensaje'))

                            <div class="col-md-offset-1 col-md-10 col-md-offset-1 col-sm-offset-1 col-sm-10 col-sm-offset-1">

                                <div class="alert alert-danger">

                                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                                    {{ Session::get('mensaje') }}

                                </div>

                            </div>

                        @endif

                        @if($action == 'Crear')

                            <div class="col-md-offset-1 col-md-10 col-md-offset-1 col-sm-offset-1 col-sm-10 col-sm-offset-1 input-group">

                                <input id="ruta_imagen" name="ruta_imagen[]" type="file" multiple=true>

                            </div>

                        @else

                            <div class="col-md-offset-1 col-md-10 col-md-offset-1 col-sm-offset-1 col-sm-10 col-sm-offset-1 input-group">

                                <div class="thumbnail">

                                    <img src="{{ asset('assets/img/'.$imagen->ruta_imagen) }}" class='file-preview-image' alt='The Moon' title='The Moon'>

                                </div>

                                <br/>

                                <input id="ruta_imagen" name="ruta_imagen" type="file">

                            </div>

                        @endif

                    </div>

                </div>

                <div class="panel-footer">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}

                </div>

            </div>

        {{ Form::close() }}

        <a href="{{ route('clienteComentario',$cliente->id) }}" class="btn btn-danger">Siguiente</a>

    </div>

    <div class="col-md-6 col-sm-6 form-horizontal">

        <div class="panel panel-default">

            <div class="panel-heading"></div>

            <div id="my_carusel" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">

                    @foreach($galeria as $key => $galerias)

                        <div class="item @if($key == 0) {{ 'active' }} @endif">

                            <img alt='Fotos del auto' src='{{ asset("assets/img/$galerias->ruta_imagen") }}' class='img-responsive' />

                            <div class='carousel-caption'>

                                <a href="{{ route('clienteChange', array($galerias->id)) }}" class="btn btn-primary">Editar</a>

                                <a href='{{ route('clienteDelete', array($galerias->id)) }}' class='btn btn-danger'>Eliminar</a>

                            </div>

                        </div>

                    @endforeach

                </div>

                <a class="left carousel-control" href="#my_carusel" role="button" data-slide="prev">

                    <span class="glyphicon glyphicon-chevron-left"></span>

                </a>

                <a class="right carousel-control" href="#my_carusel" role="button" data-slide="next">

                    <span class="glyphicon glyphicon-chevron-right"></span>

                </a>

            </div>

            <div class="panel-footer"></div>

        </div>

    </div>

</div>

@stop