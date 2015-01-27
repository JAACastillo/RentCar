<?php

class estadoSeeder extends Seeder {
	public function run(){
		estado::create(array('nombre' => "Seleccionar Carro", 	'url' => 'selectModelo', 		'popUpText' 	 => 'Agregar Carro'));
		estado::create(array('nombre' => "Extras", 				'url' => 'prestamoExtra', 		'popUpText' 	 => 'Agregar extras'));
		estado::create(array('nombre' => "Pre-Reservado", 		'url' => 'prestamoVer', 		'popUpText' 	 => 'Aprobar Reserva'));
		estado::create(array('nombre' => "Pendiente de pago", 	'url' => 'formaPago', 			'popUpText' 	 => 'Agregar Pago'));
		estado::create(array('nombre' => "Reservado", 			'url' => 'prestamoContrato', 	'popUpText' 	 => 'Entregar carro'));
		estado::create(array('nombre' => "Entregado",	 		'url' => 'prestamoRecibir', 	'popUpText' 	 => 'Recibir Carro'));
		estado::create(array('nombre' => "Completo", 			'url' => 'prestamoVer', 		'popUpText' 	 => 'Reserva Completa'));
		estado::create(array('nombre' => "Cancelado", 			'url' => 'prestamoVer', 		'popUpText' 	 => 'Cancelado'));
	}
}