<!doctype html>
<html lang="en">
    <head>
        <title>MultiAutos - Renta de Carros en El Salvador</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href='{{ asset("assets/img/favicon.ico") }}'>
        {{-- Bootstrap --}}
        {{ HTML::style('/assets/css/bootstrap.min.css', array('media' => 'screen')) }}
        {{ HTML::style('/assets/css/estilos.css', array('media' => 'screen')) }}
        {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
        <style type="text/css" media="screen">
        #row {
            -webkit-animation: box-animation 2s ease infinite alternate;
            -moz-animation: box-animation 2s ease infinite alternate;
        }
        .panel-default {
            -webkit-animation: reflection-animation 2s ease infinite alternate;
            -moz-animation: reflection-animation 2s ease infinite alternate;
            animation: reflection-animation 2s ease infinite alternate;
            background:-webkit-gradient(linear,100% 0%,0% 100%,color-stop(0,rgba(255,255,255,.5)),color-stop(.5,rgba(255,255,255,.1)),color-stop(.5,rgba(255,255,255,0)),color-stop(1,rgba(255,255,255,0)));
        }
        @-webkit-keyframes box-animation {
            0% { -webkit-transform:rotateY(-40deg); }
            100% { -webkit-transform:rotateY(40deg); }
        }
        @-moz-keyframes box-animation {
            0% { -moz-transform:rotateY(-40deg); }
            100% { -moz-transform:rotateY(40deg); }
        }
        @keyframes box-animation {
            0% { transform:rotateY(-60deg); }
            100% { transform:rotateY(0deg); }
        }
        </style>
        <!--[if lt IE 9]>
            {{ HTML::script('assets/js/html5shiv.js') }}
            {{ HTML::script('assets/js/respond.min.js') }}
        <![endif]-->
    </head>
    <body>
        <br/>
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> </button>
                    <img class="img-responsive hidden-xs" alt="600x300" src="{{ asset('assets/img/logo-multiautos1.png') }}">
                </div>  
            </nav>
            <br/>
            <br/>
            <br/>
            <div class="row" id='row'>
                <div class="col-md-offset-4 col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6 col-sm-offset-3">
                    <br/>
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <img class="img-responsive" alt="600x300" src="{{ asset('assets/img/404_bg.jpg') }}">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6 col-sm-offset-3">
                    <div class="text-center">
                        <p>La página que está buscando no existe.</p>
                        <br/>
                        <p>{{ HTML::link('prestamo', 'Inicio') }}</p>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
