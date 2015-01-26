<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carros', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('empresa_id')->index('carro_empresas');
			$table->integer('modelo_id')->index('carro_modelos');
			$table->integer('ano');
			$table->string('motor', 10);
			$table->enum('transmision', array('Manual','Automatico'));
			$table->integer('puertas');
			$table->string('capacidad', 25);
			$table->string('kmGalon', 15);
			$table->string('equipamiento', 30);
			$table->text('imagen', 65535);
			$table->integer('existencias');
			$table->integer('tipoCarro_id')->default(1)->index('carro_tipoCarro');
			$table->timestamps();
			$table->boolean('activo');
			$table->integer('color_id')->index('carros_colores');
			$table->integer('estado_id')->default(1)->index('carros_estado');
			$table->integer('combustible_id')->index('carros_combustibles');
			$table->integer('proveedor');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carros');
	}

}
