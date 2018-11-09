<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursocategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursocategorias', function (Blueprint $table) {
            $table->increments('id');
             $table->double('cuota',15,2);
            $table->enum('estado',array('ACTIVO','INACTIVO'));

            $table->integer('idcategorias')->unsigned()->nullable()->default(null);
            $table->foreign('idcategorias')->references('id')->on('categorias');
            
            $table->integer('idcursos')->unsigned()->nullable()->default(null);
            $table->foreign('idcursos')->references('id')->on('cursos');
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
        Schema::dropIfExists('cursocategorias');
    }
}
