<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCarrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carros', function(Blueprint $table)
		{
			$table->foreign('color_id', 'carros_colores')->references('id')->on('colores')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('combustible_id', 'carros_combustibles')->references('id')->on('combustibles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('estado_id', 'carros_estado')->references('id')->on('estadosCarro')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('empresa_id', 'carro_empresas')->references('id')->on('empresas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('modelo_id', 'carro_modelos')->references('id')->on('modelos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tipoCarro_id', 'carro_tipoCarro')->references('id')->on('tipoCarros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carros', function(Blueprint $table)
		{
			$table->dropForeign('carros_colores');
			$table->dropForeign('carros_combustibles');
			$table->dropForeign('carros_estado');
			$table->dropForeign('carro_empresas');
			$table->dropForeign('carro_modelos');
			$table->dropForeign('carro_tipoCarro');
		});
	}

}
