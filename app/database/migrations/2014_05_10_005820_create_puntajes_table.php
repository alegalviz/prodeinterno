<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePuntajesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('puntajes', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->integer('aciertosparciales');
            $table->integer('aciertosexactos');
            $table->integer('total');
			$table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('puntajes');
	}

}
