<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('centro_id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->string('nomb_equipo',25);
            $table->string('marca_equipo',25);
            $table->string('modelo_equipo',25);
            $table->string('serial_equipo',30)->unique();
            $table->string('bien_nacional',30)->unique();
            $table->enum('equipo_garantia',['Si','No']);
            $table->string('responsable_garantia',35)->nullable();
            $table->string('duracion_garantia',15)->nullable();
            $table->mediumText('observaciones_equipo')->nullable();
            $table->foreign('centro_id')->references('id')->on('centros')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::drop('equipos');
    }
}
