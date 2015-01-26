

<section class="panel panel-success" >
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-3 pull-right" style=" margin: 5px;">
				<select class="form-control " 
		                ng-model="groupBy" ng-change="toggle()">
		                <option value="del">Día</option>
		                <option value="modelo">Modelo</option>
		                <option value="cliente">Cliente</option>
		                <option value="placa">Placa</option>
		                <option value="tipo">tipo</option>
		                <option value="marca">marca</option>
		               
		        </select>
	        </div>
			<div class="col-md-3 pull-right" style=" margin: 5px;">
				<select class="form-control " 
		                ng-model="grafica" ng-change="toggle()">
		                <option value="0">Lineas</option>
		                <option value="1">Barra</option>
		                <option value="2">Pastel</option>
		                <option value="3">Donut</option>
		               
		        </select>
	        </div>
        </div> 
	</div>
	<canvas id="base" class="chart-base" chart-type="type" data="data" labels="labels" options="options" legend="true"></canvas> 
</section>

<!--



<section class="panel panel-success" >
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-3 pull-right" style=" margin: 5px;">
				<select class="form-control " 
		                ng-model="groupBy" ng-change="toggle()">
		                <option value="del">Día</option>
		                <option value="modelo">Modelo</option>
		                <option value="cliente">Cliente</option>
		                <option value="placa">Placa</option>
		               
		        </select>
	        </div>
			
	        <div class="pull-right">
	            <div class="btn-group">
	                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
	                    <span class="fa fa-line-chart"></span><span  ng-bind="graficas[grafica]"></span>
	                    <span class="caret"></span>
	                </button>
	                <ul class="dropdown-menu pull-right" role="menu">
	                    <li><a class="fa fa-area-chart" href="#" ng-click="grafica = 0" ng-click="toggle()"> Lineas</a></li>
	                    <li><a class="fa fa-bar-chart" href="#" ng-click="grafica = 1" ng-click="toggle()"> Barras</a></li>
	                    <li><a class="fa fa-adjust" href="#" ng-click="grafica = 2" ng-click="toggle()"> Pastel</a></li>
	                    <li><a class="fa fa-pie-chart" href="#" ng-click="grafica = 3" ng-click="toggle()"> Dona</a></li>
	                </ul>
	            </div>
        	</div> 
        </div>
	</div>
	<canvas id="base" class="chart-base" chart-type="type" data="data" labels="labels" legend="true"></canvas> 
</section>

-->