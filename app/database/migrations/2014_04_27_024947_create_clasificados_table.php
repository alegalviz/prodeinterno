<?php

use Illuminate\Database\Migrations\Migration;

class CreateClasificadosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasificados', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('label', 3);
            $table->integer('equipo_id')->unsigned();
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clasificados');
    }

}