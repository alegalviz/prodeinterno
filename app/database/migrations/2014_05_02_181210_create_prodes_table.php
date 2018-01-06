<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prodes', function(Blueprint $table) {
			$table->increments('id')->unsigned();
            $table->string('logoempresa',255);
            $table->integer('puntajeaciertoexacto');
            $table->integer('puntajeaciertoparcial');
            $table->string('bannerfixture',255);
            $table->string('bannerlogin',255);
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
		Schema::drop('prodes');
	}

}
