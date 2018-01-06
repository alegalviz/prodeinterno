<?php

use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('partido_id')->unsigned()->index();
            $table->integer('marcador_equipo1');
            $table->integer('marcador_equipo2');
            $table->integer('ganador_equipo_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete('cascade');
            $table->foreign('ganador_equipo_id')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resultados');
    }

}