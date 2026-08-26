<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSolicitudIdToAutorizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('autorizaciones', function (Blueprint $table) {
            $table->integer('solicitud_id')->unsigned()->after('proveedor_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('autorizaciones', function (Blueprint $table) {
            $table->dropForeign(['solicitud_id']);
            $table->dropColumn('solicitud_id');
        });
    }
}
