<?php

use Illuminate\Database\Migrations\Migration;

class CreateApuestasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apuestas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('partido_id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('marcador_equipo1');
            $table->integer('marcador_equipo2');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apuestas');
    }

}