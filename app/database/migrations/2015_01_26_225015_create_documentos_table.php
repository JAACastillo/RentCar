<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('numero', 25);
			$table->integer('Cliente_id')->index('documentos_Clientes');
			$table->integer('tipoDocumento_id')->index('documentos_tipoDocumentos');
			$table->date('emision')->nullable();
			$table->date('vencimiento')->nullable();
			$table->text('imagen', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('documentos');
	}

}
