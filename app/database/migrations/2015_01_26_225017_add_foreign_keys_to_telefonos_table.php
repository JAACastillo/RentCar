<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTelefonosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('telefonos', function(Blueprint $table)
		{
			$table->foreign('Cliente_id', 'telefonos_Clientes')->references('id')->on('clientes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('telefonos', function(Blueprint $table)
		{
			$table->dropForeign('telefonos_Clientes');
		});
	}

}
