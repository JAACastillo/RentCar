<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bitacoras',function($table){
            $table->increments('id');
            $table->integer('usuario_id');
            $table->enum('tabla',array('Users','Clientes','Imagenes','Marcas','Tipos','Modelos','Precios','Fotos','Extras','Prestamos','Prospectos'));
            $table->integer('tabla_id');
            $table->enum('accion',array('Crear','Actualizar','Eliminar'));
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
		Schema::drop('bitacoras');
	}

}
