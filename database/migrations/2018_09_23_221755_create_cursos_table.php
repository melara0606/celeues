<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('modulos',array('5 MODULOS','10 MODULOS'));
            $table->enum('estado',array('ACTIVO','INACTIVO'));
           // $table->string('horaInicio')->nullable()->default(null);
           // $table->string('horaFin')->nullable()->default(null);

            $table->integer('ididiomas')->unsigned()->nullable()->default(null);
            $table->foreign('ididiomas')->references('id')->on('idiomas');
            
           // $table->integer('idcategorias')->unsigned()->nullable()->default(null);
           // $table->foreign('idcategorias')->references('id')->on('categorias');
            
            $table->integer('idmodalidads')->unsigned()->nullable()->default(null);
            $table->foreign('idmodalidads')->references('id')->on('modalidads');
            

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
        Schema::dropIfExists('cursos');
    }
}
