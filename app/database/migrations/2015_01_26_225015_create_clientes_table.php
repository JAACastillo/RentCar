<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('empresa_id')->index('Clientes_Empresas');
			$table->enum('como', array('cliente','prospecto'));
			$table->string('tipo', 10);
			$table->string('nombre', 50);
			$table->text('direccion', 65535)->nullable();
			$table->string('telefono', 20);
			$table->string('celular', 20);
			$table->string('telefonoExtranjero', 20);
			$table->text('direccion_2', 65535);
			$table->enum('sexo', array('Hombre','Mujer'));
			$table->text('email', 65535)->nullable();
			$table->date('fechaNacimiento')->nullable();
			$table->integer('emergencia_id')->nullable()->index('Clientes_emergencia');
			$table->integer('adicional_id')->nullable()->index('Clientes_adicional');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clientes');
	}

}
