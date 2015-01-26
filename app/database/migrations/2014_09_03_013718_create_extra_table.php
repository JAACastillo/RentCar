<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extras',function($table) {
            $table->increments('id');
            $table->text('extra');
            $table->string('descripcion',250);
            $table->double('precio', 5, 2);
			$table->string('ruta_imagen',100);
			$table->boolean('obligatorio');
			$table->boolean('cobro');
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
		Schema::drop('extras');
	}

}
