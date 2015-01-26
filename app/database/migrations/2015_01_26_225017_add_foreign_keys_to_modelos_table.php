<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToModelosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('modelos', function(Blueprint $table)
		{
			$table->foreign('marca_id', 'modelos_marcas')->references('id')->on('marcas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('modelos', function(Blueprint $table)
		{
			$table->dropForeign('modelos_marcas');
		});
	}

}
