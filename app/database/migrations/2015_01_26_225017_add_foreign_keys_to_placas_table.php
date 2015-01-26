<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPlacasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('placas', function(Blueprint $table)
		{
			$table->foreign('carro_id', 'placas_ibfk_1')->references('id')->on('carros')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('placas', function(Blueprint $table)
		{
			$table->dropForeign('placas_ibfk_1');
		});
	}

}
