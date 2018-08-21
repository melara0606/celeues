<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('apellido',30);
            $table->enum('genero',array('MASCULINO','FEMENINO'));
            $table->date('fechaNac');

            $table->text('direccion');
            $table->text('partida')->nullable()->default(null);
            $table->string('dui',9)->nullable()->default(null);
            $table->string('telefono',8);
            $table->string('email');

            $table->integer('idresponsables')->unsigned()->nullable()->default(null);
            $table->foreign('idresponsables')->references('id')->on('responsables');
            

       
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
        Schema::dropIfExists('estudiantes');
    }
}
