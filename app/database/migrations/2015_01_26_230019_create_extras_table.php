<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 50);
			$table->text('descripcion', 65535);
			$table->float('precio', 5);
			$table->string('imagen', 100);
			$table->boolean('obligatorio');
			$table->boolean('cobro');
			$table->boolean('activo');
			$table->timestamps();
			$table->integer('empresa_id')->index('empresa_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('extras');
	}

}
