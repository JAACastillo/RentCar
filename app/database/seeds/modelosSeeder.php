<?php


class modelosSeeder extends Seeder{
	public function run(){
		Modelo::create(array('nombre' => 'COROLLA', 'marca_id' => 1));
		Modelo::create(array('nombre' => 'YARIS', 'marca_id' => 1));
		Modelo::create(array('nombre' => 'RAV4', 'marca_id' => 1));

		Modelo::create(array('nombre' => 'SENTRA', 'marca_id' => 2));
		Modelo::create(array('nombre' => 'ALTIMA', 'marca_id' => 2));

		Modelo::create(array('nombre' => 'RUNNER', 'marca_id' => 3));
	}
}