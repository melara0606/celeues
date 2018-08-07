<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            //$table->enum('modalidad',array('INTENSIVO','SEMANAL'));
            $table->enum('turno',array('TARDE','MAÑANA'));
            $table->enum('estado',array('ACTIVO','INACTIVO'));
            
            
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
        Schema::dropIfExists('modalidads');
    }
}