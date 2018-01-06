<?php

use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('grupo_id')->unsigned();
            $table->string('codigo', 3);
            $table->string('nombre', 255)->nullable();
            $table->timestamps();
            $table->foreign('grupo_id')->references('id')->on('grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipos');
    }

}