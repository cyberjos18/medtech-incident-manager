<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nomb_centro',100);
            $table->integer('estado_id')->unsigned();
            $table->integer('localidad_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->string('director_centro',25)->unique();
            $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('localidad_id')->references('id')->on('localidades')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::drop('centros');
    }
}
