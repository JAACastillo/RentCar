<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('prospectos',function($table){
            $table->increments('id');
            $table->string('nombre');
			$table->string('direccion');
            $table->string('doc_unico')->unique();
            $table->enum('sexo',array('','Hombre','Mujer'));
            $table->string('email')->unique();
			$table->date('fecha_nac');
            $table->string('telefono');
            $table->string('celular');
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
		Schema::drop('prospectos');
	}

}
