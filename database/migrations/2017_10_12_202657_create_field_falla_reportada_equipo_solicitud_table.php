<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldFallaReportadaEquipoSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipo_solicitud', function (Blueprint $table) {
            $table->string('falla_reportada',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipo_solicitud', function (Blueprint $table) {
            $table->dropColumn('falla_reportada');
        });
    }
}
