<?php

class combustibleSeeder extends Seeder{
	public function run(){
		Combustible::create(array('nombre' => 'Gasolina'));
		Combustible::create(array('nombre' => 'Diesel'));
	}
}