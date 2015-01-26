<div class="list-group">
	<div class="list-group-item list-group-item-info text-center">
		<h4 class="list-group-item-heading">Resumen</h4>
	</div>

	@if(!is_null($prestamo->carro_id))
		
		<div class="list-group-item ">
			<h4 class="list-group-item-heading text-center">{{$prestamo->carro->modelo->marca->nombre}}
				<br>
				<small>
					{{$prestamo->carro->modelo->nombre}} {{$prestamo->carro->ano}}
					@if($prestamo->placa_id)
						({{$prestamo->placa->numero}})
					@endif


				</small>
			</h4>
			<p class="list-group-item-text"> 1 día = ${{$prestamo->precio}}</p>
			<p class="list-group-item-text">
				{{$prestamo->dias}} días = ${{$prestamo->precioDias}} 
			</p>
			<p class="list-group-item-text">
				{{$prestamo->horas}} horas = ${{$prestamo->precioHoras }} 
			</p>
		</div>


		<div class="list-group-item list-group-item-warning text-center">
			<h4 class="list-group-item-heading">SUB TOTAL: $ {{$prestamo->totalCarro}}</h4>
		</div>
		<?php $precio = 0;?>
		@foreach($prestamo->extras as $extra)
			<div class="list-group-item ">
				<h4 class="list-group-item-heading" style="position: relative;">
					{{$extra->definicion->nombre}}
					<small>@ {{$extra->precio}}</small>
					<small class='pull-right'>$
						{{round($extra->cantidad($prestamo->dias,$prestamo->horas),2)}}
					</small>
				</h4>
				<a href="{{route('extraDelete',$extra->id)}}" style="   position: absolute;
																	    right: 0px;
																	    top: 0px;
																	    padding: 0px 3px;
																	    background-color: rgb(252, 211, 211);
																	    color: rgb(174, 53, 53);
																	    border-bottom-left-radius: 3px;
																	    font-size: smaller;
																	    border-bottom-right-radius: 3px;">
				X
				</a>
			</div>

			<?php
				$precio += round($extra->cantidad($prestamo->dias,$prestamo->horas),2);
			?>
		@endforeach

		<div class="list-group-item list-group-item-info text-center">
			<h4 class="list-group-item-heading">
				TOTAL: $ {{$prestamo->total($precio)}}
				@if($prestamo->descuento)
					<small class="pull-right">
						({{$prestamo->descuento}}%)
					</small>
				@endif
			</h4>
		</div>
	@endif

	<div  class="list-group-item">
	<h4 class="list-group-item-heading">Lugares  
		<small class="pull-right">
			<a href="{{ route('prestamoEditar', $prestamo->id) }}">
				editar
			</a>
		</small> 
	</h4>
	<p class="list-group-item-text">{{$prestamo->lugarEntrega->nombre}}</p>
	<p class="list-group-item-text">{{$prestamo->lugarDevolucion->nombre}}</p>
		<br>
	<h4 class="list-group-item-heading">Fechas <small class="pull-right">{{$prestamo->dias}} días, {{$prestamo->horas}} horas.</small> </h4>
	<p class="list-group-item-text">{{$prestamo->fechaReserva}}</p>
	<p class="list-group-item-text">{{$prestamo->fechaDevolucion}}</p>
	</div>
</div>