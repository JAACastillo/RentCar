
<h4 class="extras"  ng-show="reserva.extras">Extras
</h4>
<?php $precio = 0; ?>
<div class="widget-content widget-extras">							
	@foreach($prestamo->extras as $extra)
		<p > {{$extra->definicion->nombre}} <span class="price"> {{$extra->precio}}</span></p>
		
		<?php
			$precio += round($extra->cantidad($prestamo->dias,$prestamo->horas),2);
		?>
	@endforeach
</div>

<div class="widget-footer widget-footer-total">
	Total: $ {{$prestamo->total($precio)}}
</div>