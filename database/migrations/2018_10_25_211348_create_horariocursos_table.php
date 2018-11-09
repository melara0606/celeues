<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariocursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horariocursos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('horaInicio')->nullable()->default(null);
            $table->string('horaFin')->nullable()->default(null);

            $table->integer('idcursos')->unsigned()->nullable()->default(null);
            $table->foreign('idcursos')->references('id')->on('cursos');

            $table->integer('iddias')->unsigned()->nullable()->default(null);
            $table->foreign('iddias')->references('id')->on('dias');

            
            
           
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
        Schema::dropIfExists('horariocursos');
    }
}
