<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numPeriodo');
            $table->enum('nombre', array('5','10'));//esto es periodos
            $table->integer('año');
            $table->date('fechaIni');
            $table->date('iniPago');
            $table->date('fechaFin');
            $table->date('finPago');

          //  $table->enum('modalidad',array('5','10'));
            $table->enum('estado',array('ACTIVO','INACTIVO','CURSADO' ));
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
        Schema::dropIfExists('periodos');
    }
}
