<?php

class tipoMantenimientos extends Seeder{
	public function run(){
		tipoMantenimiento::create(array('nombre' => 'Cambio Aceite'));
		tipoMantenimiento::create(array('nombre' => 'Reparación'));
	}
}