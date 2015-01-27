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
		// $this->call('empresaSeeder');
		// $this->call('lugaresSeeder');
		// $this->call('userSeeder');

		// $this->call('marcaSeeder');
		$this->call('modelosSeeder');

		// $this->call('UserTableSeeder');
	}

}
