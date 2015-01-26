<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('precios',function($table){
            $table->increments('id');
            $table->double('precio', 6, 2);
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->integer('modelo_id');
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
		Schema::drop('precios');
	}

}
