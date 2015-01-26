<h4>
	Fecha &amp; ubicación
	<a href="{{route('home')}}" title="" ng-show="edit">Edit</a>
</h4>
<div class="widget-content widget-info">									
	<h4>Fecha reserva </h4>
	<p ng-bind="reserva.fechaReserva"></p>
	<h4>Fecha devolución</h4>
	<p ng-bind="reserva.fechaDevolucion"></p>
	<h4>Lugar de entrega y devolución </h4>
	<p ng-bind="reserva.lugarEntrega ">
		<span ng-bind="  reserva.lugarDevolucion"> </span>
	</p>
</div>