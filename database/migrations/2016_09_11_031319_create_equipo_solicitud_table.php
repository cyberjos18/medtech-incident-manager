<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_solicitud', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->integer('solicitud_id')->unsigned();
            $table->integer('equipo_id')->unsigned();
            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::drop('equipo_solicitud');
    }
}
