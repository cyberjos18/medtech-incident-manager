<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('autorizacion_id')->unsigned()->nullable();
            $table->integer('centro_id')->unsigned();
            $table->string('numero_solicitud',25)->unique();
            $table->date('fecha_solicitud');
            $table->string('falla_reportada',255);
            $table->string('responsable_emision',25);
            $table->string('jefe_servicio',25);
            $table->foreign('centro_id')->references('id')->on('centros')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('autorizacion_id')->references('id')->on('autorizaciones')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::drop('solicitudes');
    }
}
