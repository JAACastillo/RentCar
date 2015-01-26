<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelefonosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('telefonos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('numero', 25);
			$table->integer('Cliente_id')->index('telefonos_Clientes');
			$table->enum('tipo', array('Movil','Fijo','Extranjero','local'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('telefonos');
	}

}
