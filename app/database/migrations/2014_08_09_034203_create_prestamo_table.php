<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('prestamos',function($table){
            $table->increments('id');
            $table->enum('lugarEntrega',array('Aeropuerto','Oficina Central','Adomicilio'));
            $table->string('lugarDevolucion');
            $table->datetime('horario_rsv');
            $table->datetime('horario_dvl');
			$table->enum('tipo_pago', array('','Tarjeta de Crédito','Efectivo'));
			$table->integer('descuento');
			$table->integer('cliente_id');
			$table->integer('modelo_id');
			$table->integer('precio_id');
			$table->enum('estado', array('Pre-reservado','Pendiente de Pago','Reservado'));
			$table->string('password');
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
