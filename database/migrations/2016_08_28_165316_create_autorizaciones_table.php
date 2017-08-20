<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizaciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('proveedor_id')->unsigned();
            $table->integer('numero_autorizacion')->unique();
            $table->date('fecha_autorizacion');
            $table->enum('status',['En Proceso','Falta Repuesto','No Procede','Talleres','Ejecutado']);
            $table->mediumText('seguimiento')->nullable();
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
        //DB::statement("ALTER TABLE 'autorizaciones' CHANGE  'numero_autorizacion' 'numero_autorizacion' INT(2) UNSIGNED ZEROFILL NOT NULL DEFAULT '1';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autorizaciones');
    }
}
