<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('documentos', function(Blueprint $table)
		{
			$table->foreign('Cliente_id', 'documentos_Clientes')->references('id')->on('clientes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tipoDocumento_id', 'documentos_tipoDocumentos')->references('id')->on('tipoDocumentos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('documentos', function(Blueprint $table)
		{
			$table->dropForeign('documentos_Clientes');
			$table->dropForeign('documentos_tipoDocumentos');
		});
	}

}
