<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('apellido', 30);
            $table->string('email');
            $table->string('dui');
            $table->string('telefono');
            $table->string('nit');
            $table->string('ncuenta');
            $table->enum('estado',array('ACTIVO','INACTIVO'));
            $table->enum('genero',array('FEMENINO','MASCULINO'));
           
            $table->integer('idusers')->unsigned()->nullable()->default(null);
            $table->foreign('idusers')->references('id')->on('users');
           
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
        Schema::dropIfExists('docentes');
    }
}
