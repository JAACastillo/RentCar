<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLugaresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lugares', function(Blueprint $table)
		{
			$table->foreign('empresa_id', 'lugares_Empresas')->references('id')->on('empresas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lugares', function(Blueprint $table)
		{
			$table->dropForeign('lugares_Empresas');
		});
	}

}
