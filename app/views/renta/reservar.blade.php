<form id="slider-form" class="main-form" action="{{route('chooseCar')}}" method="POST" ng-controller="reservaController">
	<div class="main_form_navigation">				
		<div id="manage_reservation" class="title-form back"><a href="#" title="">Administrar Reservacion</a></div>
		<div id="book_car" class="title-form current"><a href="#" title="">Reservar Carro</a></div>
	</div>
	<div id="book_car_content" class="content-form ">
		<div class="form-block pick-up">
			<h4>¿Desde qué fecha necesita el vehículo?</h4>
			{{ Form::text('fechaReserva', null, array('placeholder' => 'Fecha de Reserva', 'style' => 'width:140px', 'class' => 'datepicker minDate', 'id' => 'fechaReserva', 'ng-model' => 'reserva.fechaReserva')) }}
		</div>
		<div class="form-block drop-off">
			<h4>¿Hasta qué fecha necesita el vehículo?</h4>
			{{ Form::text('fechaDevolucion', null, array('placeholder' => 'Fecha de Devolución', 'style' => 'width:140px', 'class' => 'datepicker maxDate', 'id' => 'fechaDevolucion', 'ng-model' => 'reserva.fechaDevolucion')) }}
		</div> 
		<br/><br/><br/><br/><br/><br/>
		<div class="form-block type-lugar">
			<h4>¿Donde desea que le entreguemos el vehículo?</h4>
			{{ Form::select('lugarEntrega', $lugares, null, array('class' => 'select ', 'id' => 'lugarEntrega', 'ng-model' => 'reserva.lugarEntrega')) }} 
		</div>
		<div class="form-block return_location type-lugar-2">
			<h4>¿En que lugar desea regresar el vehículo?</h4>
			{{ Form::select('lugarDevolucion', $lugares, null, array('class' => 'select ', 'id' => 'lugarDevolucion', 'ng-model' => 'reserva.lugarDevolucion')) }} 
		</div>
		<br/><br/><br/><br/><br/>
		<div class="">
			<input id="location-checkbox" type="checkbox" class="styled" name="checkbox_location" value="1"/>
			<label for="location-checkbox"> Devolver en ubicación diferente</label>
		</div>
		<br/><br/>
		<!-- <a href="" ng-click="book()">enviar</a> -->
		<div class="form-block block-form">
			<input class="orange_button form-continue"  ng-click="book()" type="submit" value="Continue "/>
		</div>
		<br/><br/>
	</div>
	<div id="manage_reservation_content"  class="content-form hidden">
		<div class="location-block">
			<div class="form-block location">Código de reserva</div>
			<input class="location" type="text" value="" placeholder="Digite el código de reserva" ng-model="reservas.codigo"/>
		</div>
		<div class="form-block form-submit">
			<input class="orange_button form-continue" ng-click="administrarReserva()" value="Buscar reserva"/>
		</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</div>
	<div class="clear"></div>
</form>
<div id="slider-post">
	<div class="post">
		<div class="entry-header">
			<h3 class="entry-format">Grandes ofertas.</h3>
		</div>
		<div class="entry-content">Phasellus eget ultricies libero. Sed dolor turpis, malesuada vitae cursus a, auctor semper neque.</div>
		<div class="entry-meta"><a href="#" title="">Learn more</a></div>
	</div>		
</div>
<div id="slider-front-img">	
	<img alt="" src="assets/renta/images/slider_front_img.png"></img>
</div>


