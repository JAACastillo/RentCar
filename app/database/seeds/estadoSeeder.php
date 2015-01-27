<?php

class estadoSeeder extends Seeder {
	public function run(){
		estado::create(array('nombre' => "Seleccionar Carro", 	'url' => 'selectModelo', 		'porUpText' => 'Agregar Carro'));
		estado::create(array('nombre' => "Extras", 				'url' => 'prestamoExtra', 		'Aprobar' 	 => 'Agregar extras'));
		estado::create(array('nombre' => "Pre-Reservado", 		'url' => 'prestamoVer', 		'Aprobar' 	 => 'Aprobar Reserva'));
		estado::create(array('nombre' => "Pendiente de pago", 	'url' => 'formaPago', 			'Aprobar' 	 => 'Agregar Pago'));
		estado::create(array('nombre' => "Reservado", 			'url' => 'prestamoContrato', 	'Aprobar' 	 => 'Entregar carro'));
		estado::create(array('nombre' => "Entregado",	 		'url' => 'prestamoRecibir', 	'Aprobar' 	 => 'Recibir Carro'));
		estado::create(array('nombre' => "Completo", 			'url' => 'prestamoVer', 		'Aprobar' 	 => 'Reserva Completa'));
		estado::create(array('nombre' => "Cancelado", 			'url' => 'prestamoVer', 		'Aprobar' 	 => 'Cancelado'));
	}
}