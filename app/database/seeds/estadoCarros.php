<?php

class estadoCarros extends Seeder{
	public function run(){
		EstadoCarro::create(array('nombre' => 'Disponible'));
	}
}