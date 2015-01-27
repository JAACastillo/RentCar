<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlacasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('placas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero', 20);
			$table->string('kilometraje', 20);
			$table->integer('carro_id')->index('carro_id');
			$table->string('proveedor', 40);
			$table->boolean('activo')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('placas');
	}

}
