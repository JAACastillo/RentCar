<?php

class empresaSeeder extends Seeder{
	public function run(){
		Empresa::create(array(
        		'email' 		=> 'rsanabria@hotmail.es',
          		'nombre'		=> 'Multi Autos',
        		'telefono'		=> '2313-1444'
        ));
	}
}