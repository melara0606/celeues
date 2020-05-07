<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrestamosDocenteEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("equipo_id")->unsigned()->index();
            $table->integer("docente_id")->unsigned()->index();

            $table->string("observaciones", 100);
            $table->tinyInteger('estado')->default(1);

            $table->foreign("equipo_id")->references("id")->on("equipos");
            $table->foreign("docente_id")->references("id")->on("docentes");

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
        Schema::dropIfExists('prestamos');
    }
}
