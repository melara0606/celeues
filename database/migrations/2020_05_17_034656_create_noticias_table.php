<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion')->nullable()->default(null);
            $table->string('numModulo');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->integer('numInteresados');//-->nuevo
            $table->integer('numRegistrados');//-->nuevo

            $table->enum('modalidad',array('Intensivo','Sabatino','Dominical'));
           // $table->integer('idcursos')->unsigned()->nullable()->default(null);//-->nuevo
            //$table->foreign('idcursos')->references('id')->on('cursos');
            
            $table->enum('estado',array('Disponible','Finalizado'));
           
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
        Schema::dropIfExists('noticias');
    }
}
