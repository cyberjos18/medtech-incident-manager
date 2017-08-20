<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_proveedores', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->string('id',45);
            $table->primary('id');
            $table->integer('proveedor_id')->unsigned();
            $table->integer('autorizacion_id')->unsigned();
            $table->string('numero_reporte',10)->unique();
            $table->date('fecha_atencion');
            $table->string('tecnico_responsable',25);
            $table->mediumText('observaciones');
            $table->foreign('autorizacion_id')->references('id')->on('autorizaciones')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::drop('reportes_proveedores');
    }
}
