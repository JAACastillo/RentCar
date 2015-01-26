<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrestamoExtraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prestamoExtra', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->float('precio', 5);
			$table->integer('prestamo_id')->index('prestamoExtra_prestamos');
			$table->integer('extra_id')->index('prestamoExtra_extras');
			$table->boolean('unaVez');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prestamoExtra');
	}

}
