<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPreciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('precios', function(Blueprint $table)
		{
			$table->foreign('carro_id', 'precios_carros')->references('id')->on('carros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('precios', function(Blueprint $table)
		{
			$table->dropForeign('precios_carros');
		});
	}

}
