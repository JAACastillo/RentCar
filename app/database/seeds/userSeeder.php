<?php

class userSeeder extends Seeder{
	public function run(){
		User::create(array(
        		'email' 		=> 'rsanabria@hotmail.es',
        		'empresa_id'	=> '1',
        		'nombre'		=> 'Rene Orlando Sanabria',
        		'password'		=> Hash::make('sanabria'),
        		'tipo'			=> 'Administrador',
        ));
	}
}