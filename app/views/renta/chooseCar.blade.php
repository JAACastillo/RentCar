@extends('renta.template')

@section('titulo')
	Selecciona el carro.
@stop
@section('main')
	@include('renta.progressBar')
	<div id="main">
		@include('renta.updateFechas')

		
		<div id="primary" ng-controller="chooseCarController" ng-show="reserva.fechaReserva">					
			<div class="clear"></div>
			@include('renta.extraAside')
			<div id="content" class="sidebar-middle">
				<div class="widget main-widget product-widget">
					<div class="content-overlay">
						<img class="ajax-loader" src="images/ajax-loader.gif" alt="" />
					</div>
					@include('renta.carsJS')						
				</div>

				<pagination total-items="totalItems" ng-model="currentPage" items-per-page='perPage' max-size='7' ng-change="pageChanged()"></pagination>
				<!-- <div class="pagination">
					<div class="left"></div>
					<div class="current">1</div>
					<div>2</div>
					<div>3</div>
					<div>...</div>
					<div>10</div>
					<div class="right"></div>
					<p class="clear"></p>
				</div>
			</div>				 -->
			<div class="clear"></div>
		</div>	



	</div>
@stop