<!doctype html>
<html lang="en">
    <head>
        <title>MultiAutos - Renta de Carros en El Salvador</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href='assets/img/favicon.ico'>
        {{-- Bootstrap --}}
        {{ HTML::style('/assets/css/bootstrap.min.css', array('media' => 'screen')) }}
        {{ HTML::style('/assets/css/estilos.css', array('media' => 'screen')) }}
        {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            {{ HTML::script('assets/js/html5shiv.js') }}
            {{ HTML::script('assets/js/respond.min.js') }}
        <![endif]-->
    </head>
    <body>
        <br/>
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation"></nav>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6 col-sm-offset-3">
                    <img class="img-responsive hidden-xs" alt="600x300" src="assets/img/logo-multiautos.png">
                    <br/>
                    @if(Session::has('mensaje_info'))
                        <div class="alert {{ Session::get('clase') }}">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('mensaje_info') }}
                        </div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Iniciar Sesión</h3>
                        </div>
                        {{ Form::open(array('url' => '/login', 'method' => 'post', 'class' => 'form-horizontal')) }}
                            <div class="panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
                                </div>
                                <br/>
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-eye-close"> </span>
                                    {{ Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        {{ Form::button('Entrar', array('type' => 'submit', 'class' => 'btn btn-default', 'id'=>'enviar')) }}
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
        {{-- Include all compiled plugins (below), or include individual files as needed --}}
        {{ HTML::script('/assets/js/jquery.tools.min.js') }}
        {{ HTML::script('/assets/js/bootstrap.min.js') }}
    </body>
</html>