<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fotos', function(Blueprint $table)
		{
			$table->foreign('carro_id', 'fotos_carros')->references('id')->on('carros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fotos', function(Blueprint $table)
		{
			$table->dropForeign('fotos_carros');
		});
	}

}
