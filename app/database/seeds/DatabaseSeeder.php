<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('empresaSeeder');
		$this->call('lugaresSeeder');
		$this->call('userSeeder');

		$this->call('marcaSeeder');
		$this->call('modelosSeeder');

		$this->call('tipoSeeder');

		$this->call('combustibleSeeder');
		$this->call('colorSeeder');

		$this->call('estadoCarros');
		$this->call('estadoSeeder');

		$this->call('tipoMantenimientos');
		$this->call('tipoDocumentos');

		$this->call('UserTableSeeder');
	}

}
