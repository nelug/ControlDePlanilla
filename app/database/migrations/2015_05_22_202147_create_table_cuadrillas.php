<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuadrillas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuadrillas', function(Blueprint $table)
		{
			$table->increments('id');
	        $table->string('cuadrilla', 15)->unique();
	        $table->string('caporal');
	        $table->integer('correlativo');
	        $table->integer('user_id')->unsigned();
	        $table->integer('melonera_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
			$table->foreign('melonera_id')->references('id')->on('meloneras')->onDelete('restrict')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuadrillas');
	}


}
