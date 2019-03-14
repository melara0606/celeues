<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numNivel');
            
            $table->integer('ididiomas');
            $table->integer('ididcategorias');
            $table->integer('idmodalidads');
            $table->enum('estado',array('ACTIVO','INACTIVO'));
           
            


            $table->integer('idcursocategorias')->unsigned()->nullable()->default(null);
            $table->foreign('idcursocategorias')->references('id')->on('cursocategorias');
    
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
        Schema::dropIfExists('nivels');
    }
}
