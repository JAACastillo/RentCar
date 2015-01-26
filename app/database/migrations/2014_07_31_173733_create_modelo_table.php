<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('modelos',function($table){
            $table->increments('id');
            $table->string('modelo',100);
            $table->string('año',10);
            $table->string('motor',50);
            $table->string('transmision',50);
            $table->integer('puertas');
            $table->string('color',50);
            $table->string('capacidad',100);
            $table->string('km_galon',30);
            $table->string('tipo_combustible',30);
            $table->string('equipamiento',250);
            $table->integer('existencias');
            $table->enum('estado', array('Disponible','Reservado','Prestado'));
            $table->integer('marca_id');
            $table->integer('tipo_id');
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
		Schema::drop('modelos');
	}

}
