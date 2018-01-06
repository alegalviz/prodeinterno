<?php

use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->boolean('ronda')->unsigned();
            $table->integer('estadio_id')->unsigned();
            $table->integer('equipo1_id')->unsigned();
            $table->integer('equipo2_id')->unsigned();
            $table->dateTime('inicio');
            $table->timestamps();
            $table->foreign('estadio_id')->references('id')->on('estadios');
            $table->foreign('equipo1_id')->references('id')->on('equipos');
            $table->foreign('equipo2_id')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partidos');
    }

}