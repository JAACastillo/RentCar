<h4>
	Fecha &amp; ubicación
</h4>
<div class="widget-content widget-info">									
	<h4>Fecha reserva </h4>
	<p > {{$prestamo->fechaReserva}}</p>
	<h4>Fecha devolución</h4>
	<p >  {{$prestamo->fechaReserva}}</p>
	<h4>Lugar de entrega y devolución </h4>
	<p >
		 {{$prestamo->lugarEntrega->nombre}} - 
		 {{$prestamo->lugarDevolucion->nombre}} 
	</p>
</div>