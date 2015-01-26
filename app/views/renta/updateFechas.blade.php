
<form id="slider-form" ng-submit='book()' class="main-form" ng-controller="reservaController">		
	<div id="book_car" class="title-form current">
		<img src="images/search.png" alt="" />
		Buscar un carro:
		<div class="label label-danger pull-right" ng-hide="reserva.fechaReserva"> Selecciona las fechas para que te mostremos los carros disponibles</div>
	</div>
	<div id="book_car_content" class="content-form ">
		<div class="form-block type-lugar">
					<h4>¿Donde desea que le entreguemos el vehículo?</h4>
					{{ Form::select('lugarEntrega', $lugares, null, array('class' => 'select minDate', 'id' => 'lugarEntrega', 'ng-model' => 'reserva.lugarEntrega')) }} 
					<br/>
					<input id="location-checkbox" type="checkbox" class="styled" name="checkbox_location" value="1"/>
					<label for="location-checkbox"> Devolver en ubicación diferente</label>
					<br/>
					<div class="form-block return_location type-lugar">
						<h4>¿En que lugar desea regresar el vehículo?</h4>
						{{ Form::select('lugarDevolucion', $lugares, null, array('class' => 'select maxDate', 'id' => 'lugarDevolucion', 'ng-model' => 'reserva.lugarDevolucion' )) }}
					</div>
				</div>
				<div class="form-block pick-up">
					<h4>¿Cuando lo necesita?</h4>
					{{ Form::text('fechaReserva', null, array('placeholder' => 'Fecha / Hora de Reservación', 'class' => 'datepicker minDate', 'id' => 'fechaReserva', 'ng-model' => 'reserva.fechaReserva', 'style' => 'width:140px')) }}
				</div>
				<div class="form-block drop-off">
					<h4>¿Hasta cuando lo usará?</h4>
					{{ Form::text('fechaDevolucion', null, array('placeholder' => 'Fecha / Hora de Devolución', 'class' => 'datepicker maxDate', 'id' => 'fechaDevolucion',  'ng-model' => 'reserva.fechaDevolucion', 'style' => 'width:140px')) }}
				</div>
				<div class="form-block form-submit">
					<input class="orange_button form-update" ng-click="update()" type="submit" value="Buscar"/>
				</div>
	</div>					
	<div class="clear"></div>
</form>	