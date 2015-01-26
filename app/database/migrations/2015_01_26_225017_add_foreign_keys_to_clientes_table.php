<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clientes', function(Blueprint $table)
		{
			$table->foreign('adicional_id', 'Clientes_adicional')->references('id')->on('clientes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('emergencia_id', 'Clientes_emergencia')->references('id')->on('clientes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('empresa_id', 'Clientes_Empresas')->references('id')->on('empresas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clientes', function(Blueprint $table)
		{
			$table->dropForeign('Clientes_adicional');
			$table->dropForeign('Clientes_emergencia');
			$table->dropForeign('Clientes_Empresas');
		});
	}

}
