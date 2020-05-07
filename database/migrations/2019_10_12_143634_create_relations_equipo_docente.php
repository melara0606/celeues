<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsEquipoDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_equipo', function (Blueprint $table) {
          $table->increments('id');
          $table->integer("equipo_id")->unsigned()->index();
          $table->integer("docente_id")->unsigned()->index();

          $table->foreign("equipo_id")->references("id")->on("equipos");
          $table->foreign("docente_id")->references("id")->on("docentes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_equipo');
    }
}
