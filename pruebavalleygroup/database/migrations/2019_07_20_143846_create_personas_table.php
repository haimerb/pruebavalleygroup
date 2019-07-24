<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Corre la Migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo');
            $table->integer('edad');
            $table->timestamps();
            $table->unsignedBigInteger('profesion_id'); 
            $table->foreign('profesion_id')->references('id')->on('profesiones');

            $table->unsignedBigInteger('barrio_id'); 
            $table->foreign('barrio_id')->references('id')->on('barrios');
        });
    }

    /**
     * Reversa la Migracións.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
