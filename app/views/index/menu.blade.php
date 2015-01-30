<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse navbar-inverse-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
            
            <!-- <li class="dropdown"> -->
               <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contactos<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                   
                </ul> -->
                <li><img class="img-responsive" alt="600x300" src="{{url('assets/images/logos/' . Auth::user()->empresa->logo)}}" width="100px" height="30px"></li>
                <li>{{ HTML::link(route('prestamoLista'), 'Prestamos') }}</li>
                <li>{{ HTML::link(route('clienteLista'), 'Clientes') }}</li>
                <li>{{ HTML::link(route('prospectoList'), 'Prospectos') }}</li>

                <!-- <li>{{ HTML::link('boletin', 'Boletin') }}</li> -->
            <!-- </li> -->
           <!--  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>{{ HTML::link('/marca', 'Marca') }}</li>
                    <li>{{ HTML::link('tipo', 'Tipo') }}</li>
                    <li>{{ HTML::link(route('carros'), 'Modelos') }}</li>
                    <li class="divider"></li>
                    <li>{{ HTML::link('extra', 'Extras / Servicios') }}</li>
                </ul>
            </li> -->
            <li>{{ HTML::link(route('carros'), 'Carros') }}</li>
            <li>{{ HTML::link(route('extra'), 'Extras / Servicios') }}</li>
              @if(Auth::user()->empresa->id == 1)
                    <li>{{HTML::link(route('marcas'), 'Marcas')}}</li>
                    <li>{{HTML::link(route('modelos'), 'Modelos')}}</li>
                @endif  
        </ul>
        <form class="navbar-form navbar-left" role="search"  ng-controller='searchController'>
          <div class="form-group">
            <input type="text" ng-model="search" placeholder="¿Qué quieres buscar?" 
                    typeahead="result as result.name for result in getSearch($viewValue)" 
                    typeahead-loading="loadingLocations" 
                    typeahead-on-select='onSelect($item, $model, $label)'
                    typeahead-min-length = "2"
                    class="form-control">
          </div>
          <i ng-show="loadingLocations" class="glyphicon glyphicon-refresh"></i>

        </form>
        <?php
            $name = explode(" ", Auth::user()->nombre);
            $name = $name[0]. ' '.end($name) ;
        ?>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $name }} <strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>{{ HTML::link(route('usuarios'), ' Usuarios', array('class' => 'glyphicon glyphicon-user')) }}</li>
                    <li>{{ HTML::link(route('admin'), ' Inicio', array('class' => 'glyphicon glyphicon-home')) }}</li>
                    <li class="divider"></li>
                    <li>{{ HTML::link(route('reportes'), ' Reportes', array('class' => 'glyphicon glyphicon-calendar')) }}</li>
                    <li>{{ HTML::link(route('empresas'), ' Empresas', array('class' => 'glyphicon fa fa-building')) }}</li>           

                    <li class="divider"></li>
                    <li>{{ HTML::link('/logout', ' Salir', array('class' => 'glyphicon glyphicon-off')) }}</li>
                </ul>
            </li>
        </ul>
    </div>
</nav>