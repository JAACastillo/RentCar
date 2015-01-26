<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPrestamosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prestamos', function(Blueprint $table)
		{
			$table->foreign('carro_id', 'prestamos_carro')->references('id')->on('carros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('cliente_id', 'prestamos_Clientes')->references('id')->on('clientes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('empresa_id', 'prestamos_Empresas')->references('id')->on('empresas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('estado_id', 'prestamos_estados')->references('id')->on('estados')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('lugarEntrega_id', 'prestamos_lugarDevolucion')->references('id')->on('lugares')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('lugarDevolucion_id', 'prestamos_lugarEntrega')->references('id')->on('lugares')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prestamos', function(Blueprint $table)
		{
			$table->dropForeign('prestamos_carro');
			$table->dropForeign('prestamos_Clientes');
			$table->dropForeign('prestamos_Empresas');
			$table->dropForeign('prestamos_estados');
			$table->dropForeign('prestamos_lugarDevolucion');
			$table->dropForeign('prestamos_lugarEntrega');
		});
	}

}
