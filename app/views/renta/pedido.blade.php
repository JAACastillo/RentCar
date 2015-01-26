
<aside class="" ng-controller="reservaController" ng-show="reserva.carro">	
	<div class="widget">
		<h3 class="widget-title">
			<img src="images/order_info.png" alt="" />
			Pedido en proceso
			<a class="pullRight btnOrange" href="{{route('revisar')}}" style="color:#ffffff"> Revisar y Pagar</a>

		</h3>
		<div class="enLinea">
			@include('renta.detallePedido.fechas')
		</div>
		<div class="enLinea">
			@include('renta.detallePedido.carro')
			@include('renta.detallePedido.total')
		</div>
		<div class="enLinea">
			@include('renta.detallePedido.extras')
		</div>
	</div>															
</aside>	

