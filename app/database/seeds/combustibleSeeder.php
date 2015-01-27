<?php

class combustibleSeeder extends Seeder{
	public function run(){
		Combustible::create('nombre' => 'Gasolina');
		Combustible::create('nombre' => 'Diesel');
	}
}