<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrestamosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prestamos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('empresa_id')->index('prestamos_Empresas');
			$table->integer('carro_id')->nullable()->index('prestamos_carro');
			$table->integer('placa_id');
			$table->float('valorReposicion', 10, 0);
			$table->integer('cliente_id')->index('prestamos_Clientes');
			$table->integer('conductor_id');
			$table->integer('estado_id')->nullable()->index('prestamos_estados');
			$table->integer('lugarEntrega_id')->index('prestamos_lugarDevolucion');
			$table->integer('lugarDevolucion_id')->index('prestamos_lugarEntrega');
			$table->dateTime('fechaReserva')->nullable();
			$table->dateTime('fechaDevolucion')->nullable();
			$table->integer('descuento')->nullable()->default(0);
			$table->float('precio', 10, 0);
			$table->enum('tipoPago', array('Efectivo','Tarjeta'));
			$table->boolean('cobroPorHora');
			$table->boolean('cancelado')->default(0);
			$table->softDeletes();
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
		Schema::drop('prestamos');
	}

}
