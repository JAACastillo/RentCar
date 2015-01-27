<?php

class lugaresSeeder extends Seeder {

    public function run()
    {
        // DB::table('users')->delete();

        Lugares::create(array(
        		'nombre' 		=> 'Aeropuerto',
        		'empresa_id'	=> '1',
        ));

        Lugares::create(array(
        		'nombre' 		=> 'A domicilio',
        		'empresa_id'	=> '1',
        ));
        
    }

}