<?php

class tipoSeeder extends Seeder{
	public function run(){
		TipoCarro::create(array('nombre' => "Sedan"));
		TipoCarro::create(array('nombre' => "Pick Up"));
		TipoCarro::create(array('nombre' => "Camioneta"));
	}
}