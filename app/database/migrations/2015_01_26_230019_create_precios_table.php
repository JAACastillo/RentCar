<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('precios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('cantidad', 5);
			$table->date('fechaInicio');
			$table->date('fechaFin');
			$table->boolean('activo');
			$table->integer('carro_id')->index('precios_carros');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('precios');
	}

}
