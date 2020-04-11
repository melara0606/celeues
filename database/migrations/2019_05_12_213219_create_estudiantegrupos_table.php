<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantegruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantegrupos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('pago');
            $table->enum('estado',array('ACTIVO','PREINSCRITO','OYENTE','EXONERADO','TRASLADADO'));
            $table->double('notaFinal',4);
            

            $table->integer('idanteriorgrupos')->nullable()->default(null);

            $table->integer('idgrupos')->unsigned()->nullable()->default(null);
            $table->foreign('idgrupos')->references('id')->on('grupos');
            
            $table->integer('idestudiantes')->unsigned()->nullable()->default(null);
            $table->foreign('idestudiantes')->references('id')->on('estudiantes');

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
        Schema::dropIfExists('estudiantegrupos');
    }
}
