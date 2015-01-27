<?php

class colorSeeder extends Seeder{
	public function run(){
		Color::create(array('color' => 'Blanco'));
		Color::create(array('color' => 'Rojo'));
		Color::create(array('color' => 'Negro'));
		Color::create(array('color' => 'Azul'));
	}
}