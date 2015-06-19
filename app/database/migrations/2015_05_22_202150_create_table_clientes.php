<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClientes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->integer('cuadrilla_id')->unsigned();
	        $table->string('dpi', 15)->unique();
	        $table->string('nombre', 100);
	        $table->string('apellido', 100);
	        $table->string('direccion', 200);
	        $table->string('direccion_actual', 200);
	        $table->string('telefono', 15);
	        $table->decimal('saldo',8, 2);
	        $table->string('foto', 200);
	        $table->tinyInteger('estado')->default(1);
	        $table->tinyInteger('bloqueado')->default(0);
	        $table->tinyInteger('sanjuan')->default(0);

			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
			$table->foreign('cuadrilla_id')->references('id')->on('cuadrillas')->onDelete('restrict')->onUpdate('cascade');
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
