<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMantenimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mantenimientos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('placa_id');
			$table->integer('tipoMantenimiento_id');
			$table->text('detalles', 65535);
			$table->date('fecha');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mantenimientos');
	}

}
