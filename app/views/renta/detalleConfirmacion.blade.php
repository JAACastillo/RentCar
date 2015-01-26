
<aside class="" ng-controller="confirmationController">	
	<div class="panel panel-primary">
		<h3 class="panel-heading">
			<img src="images/order_info.png" alt="" />
			Su solicitud ha sido recibida, se le confirmará por correo electrónico.
		</h3>
		<div class="panel-body">
			<div class="col-md-4">
				@include('renta.detallePedido.fechas')
			</div>
			<div class="col-md-4">
				@include('renta.detallePedido.carro')
				@include('renta.detallePedido.total')
			</div>
			<div class="col-md-4">
				@include('renta.detallePedido.extras')
			</div>
		</div>


		<div class="well well-sm">
			
			Recibirás un correo electrónico con los detalles de la reserva y la confirmación.
		</div>
	</div>															
</aside>	

