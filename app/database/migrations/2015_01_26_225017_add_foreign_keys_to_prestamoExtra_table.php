<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPrestamoExtraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prestamoExtra', function(Blueprint $table)
		{
			$table->foreign('extra_id', 'prestamoExtra_extras')->references('id')->on('extras')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('prestamo_id', 'prestamoExtra_prestamos')->references('id')->on('prestamos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prestamoExtra', function(Blueprint $table)
		{
			$table->dropForeign('prestamoExtra_extras');
			$table->dropForeign('prestamoExtra_prestamos');
		});
	}

}
