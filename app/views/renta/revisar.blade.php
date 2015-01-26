@extends('renta.template')
	
	@section('titulo')
		Revisar reserva.
	@stop
	@section('main')
		<style>
			.ng-dirty .ng-invalid{border-color: red}
			.ng-dirty .ng-valid{border-color: green}
		</style>
		@include('renta.progressBar')				
		<div id="main">				
			<div id="primary">					
				<div class="clear"></div>
				@include('renta.extraAside')
				<div id="content" class="sidebar-middle" ng-controller="revisarController">  
					
					<form name ="usuario" novalidate ng-submit=" usuario.$valid && guardar()">
						<div class="widget main-widget main-widget-3column">
							<div class="widget-title">
								<div>
									<img src="images/list.png" alt="" />
									Complete el formulario
								</div>
								<div class="clear"></div>
							</div>
							
							<h4>Información personal</h4>
							<div class="widget-content">
									<div class="form_element">
										<div>Nombre</div>
					                    {{ Form::text('nombre', null, array('placeholder' => 'Nombre Completo', 'ng-model' => 'user.nombre' ,'required')) }}
									</div>
									<div class="form_element">
										<div>fecha de Nacimiento</div>
										{{ Form::text('fechaNacimiento', null, array('placeholder' => 'D-M-Y', 'class' => 'fechaNacimiento', 'ng-model' => 'user.fechaNacimiento')) }}
									</div>
									<div class="clear"></div>
									<div class="form_element">
										<div>Email </div>
										{{ Form::email('email', null, array('placeholder' => 'Dirección de correo electrónico', 'ng-model' => 'user.email' ,'required')) }}
									</div>
									<div class="clear"></div>
									<div class="form_element">
										<div>Número de teléfono</div>
										{{ Form::text('telefono', null, array('data-mask' => 'phone-us','placeholder' => 'Ingresa tu número de teléfono', 'id' => 'telefono', 'ng-model' => 'user.telefono' ,'required')) }}
									</div>
									<div class="clear"></div>
									<div class="form_element form_element_checkbox">
										<input id="location-checkbox" type="checkbox" class="styled" name="checkbox_location" value="1" checked /> 
										<label for="location-checkbox"> Envíame las últimas noticias &amp; actualizaciones</label>
									</div>
									<div class="clear"></div>
							</div>
							<h4>Nota</h4>
							<div class="widget-content widget-note">
								<h4>Al completar el formulario usted recibirá:</h4>
								<ul>
									<li>Your rental voucher to produce on arrival at the rental desk</li>
									<li>A toll-free customer support number</li>
								</ul>
							</div>
						<div class="next_page">
							<input class="continue_button blue_button" ng-disabled="usuario.$invalid"type="submit" value="Reservar" />
						</div>
					</form>
				</div>				
				<div class="clear"></div>
			</div>	
		</div>
	@stop