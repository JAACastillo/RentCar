<!doctype html>
<html lang="es" ng-app='search'>
    <head>
        <title>MultiAutos - Renta de Carros en El Salvador</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href='{{ url("assets/img/favicon.ico") }}'>
        {{-- Librerias CSS --}}
        @include('index/librerias_css')
        {{-- Librerias JS --}}
        @include('index/librerias_js')
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- Menu --}}
                    @include('index/menu')
                    <br/>
                    <br/>
                    <br/>
                    <div>
                        {{-- Contenido --}}
                       {{--  @if(Auth::user()->empresa->suscripcion->mensaje)
                            <div class="alert alert-warning alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Renueva tu cuenta!</strong> {{Auth::user()->empresa->suscripcion->mensaje}}
                            </div>
                        @endif --}}

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    {{HTML::script('assets/js/vendor/Chart.js')}}
    {{HTML::script('assets/js/vendor/angular-chart.js')}}
    {{HTML::style('assets/css/vendor/angular-chart.css')}}

        @yield('script')
    </body>
</html>