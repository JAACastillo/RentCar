
<aside id="secondary" class="sidebar-left" ng-controller="reservaController">	
	<div class="widget">
		<h3 class="widget-title">
			<img src="images/order_info.png" alt="" />
			Mi Reserva
		</h3>
		@include('renta.detallePedido.carro')
		@include('renta.detallePedido.extras')
		@include('renta.detallePedido.total')
		@include('renta.detallePedido.fechas')
	</div>															
</aside>	