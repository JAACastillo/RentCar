<?php

class userSeeder extends Seeder{
	public function run(){
		User::create(array(
        		'email' 		=> 'admin@admin.com',
        		'empresa_id'	=> '1',
        		'nombre'		=> 'Jesus Alvarado',
        		'password'		=> Hash::make('admin'),
        		'tipo'			=> 'Administrador',
        ));
	}
}