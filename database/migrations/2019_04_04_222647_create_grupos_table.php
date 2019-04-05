<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cupos');
            $table->integer('numGrupo');    
            $table->enum('estado',array('INICIADO','EN CURSO','FINALIZADO'));

             $table->integer('idnivels');
             $table->foreign('idnivels')->references('id')->on('nivels');
    

             $table->integer('idperiodos')->unsigned()->nullable()->default(null);
             $table->foreign('idperiodos')->references('id')->on('periodos');

             $table->integer('idaulas')->unsigned()->nullable()->default(null);
             $table->foreign('idaulas')->references('id')->on('aulas');
            
             
    
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
        Schema::dropIfExists('grupos');
    }
}
