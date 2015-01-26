@extends('index')

@section('content')



	<div class="row" ng-controller="reservaController">
	

		<a class="btn pull-right" style="border-color: #171616; margin: 5px;" ng-click="obtener()" href="#"> Mostrar</a>
		<h5 id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
	        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
	        <span></span> <b class="caret"></b>
	    </h5>
		<section class="panel panel-primary">
				<div class="row">
					
			    </div>
			<div class="panel-heading">
			</div>
			<div class="panel-body" >
				<input type="hidden" id="start">
				<input type="hidden" id="end">
 
				<div class="page-header text-center">
					<h3>
						Reporte de Reservas <br>
						<h5>Resultados: <span class="badge badge-primary" ng-bind="reservas.length"></span>
						TOTAL: <span ng-bind="total | currency"></span>
							<a class="btn pull-right fa fa-download" style="border-color: #171616; margin: 5px;"  href="#"
								ng-click="excel()" ng-show="reservas"> 
								 EXCEL
							</a>
						</h5>
					</h3>
					@{{datos}}

				</div>
				
				<div class="col-md-7">
					@include('reportes.grafica')
				</div>
				<div class="col-md-5">
					@include('reportes.resumen')
				</div>


				<section class="col-md-12">
					<table class="table table-striped table-responsive">
						<thead class="text-center"> 
							<td>Proveedor </td>
							<td>Tipo </td>
							<td>Marca </td>
							<td>Modelo </td>
							<td>Placa </td>
							<td>Cliente </td>
							<td>Del </td>
							<td>Al </td>
							<td>Días </td>
							<td>Total </td>
						</thead>
						<tbody>
							<tr ng-repeat="reserva in reservas">
								<td ng-bind="reserva.proveedor">Proveedor </td>
								<td ng-bind="reserva.tipo">Tipo </td>
								<td ng-bind="reserva.marca">Marca </td>
								<td ng-bind="reserva.modelo">Modelo </td>
								<td ng-bind="reserva.placa">Placa </td>
								<td ng-bind="reserva.cliente">Cliente </td>
								<td ng-bind="reserva.del">Del </td>
								<td ng-bind="reserva.al">Al </td>
								<td ng-bind="reserva.duracion">Días </td>
								<td ng-bind="reserva.cantidad | currency">Total </td>
							</tr>
						</tbody>
					</table>
				</section>


			</div>
		</section>
	</div>

	<!-- 8700008 -->
	

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

{{HTML::style('assets/css/vendor/daterangepicker-bs3.css')}}
{{HTML::script('assets/js/vendor/moment.min.js')}}
{{HTML::script('assets/js/vendor/daterangepicker.js')}}


{{HTML::script('assets/renta/js/vendor/alasql.min.js')}}
{{HTML::script('assets/renta/js/vendor/xlsx.min.js')}}

@include('reportes.calendario')

@stop