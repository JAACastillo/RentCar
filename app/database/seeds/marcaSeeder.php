<?php


class marcaSeeder extends Seeder{
	public function run(){
		Marca::create(array('nombre' => 'TOYOTA'));
		Marca::create(array('nombre' => 'NISSAN'));
		Marca::create(array('nombre' => 'FORD'));
	}
}