<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('clientes',function($table){
            $table->increments('id');
            $table->string('nombre');
			$table->string('direccion');
            $table->string('direccion_2');
            $table->string('doc_unico');
            $table->enum('sexo',array('','Hombre','Mujer'));
            $table->string('email');
			$table->date('fecha_nac');
            $table->string('telefono');
            $table->string('telefono_2');
            $table->string('celular');
            $table->string('pasaporte');
			$table->string('licencia');
			$table->date('fecha_emi_lic');
			$table->date('fecha_ven_lic');
			$table->string('targeta_credito');
			$table->date('fecha_ven_cre');
            $table->enum('tipo',array('','Extrangero','Local'));
            $table->string('emergencia_nombre');
            $table->string('emergencia_direccion');
            $table->string('emergencia_telefono');
			$table->string('password');
			$table->string('adicional_nombre');
			$table->string('doc_unico_2');
			$table->string('adicional_licencia');
            $table->date('adicional_femilic');
            $table->date('adicional_fevenlic');
			$table->string('ruta_imagen',100);
			$table->text('comentario');
			$table->rememberToken();
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
		Schema::drop('clientes');
	}

}
