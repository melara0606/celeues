<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->double('nota',4);

            $table->integer('idestudiantegrupos')->unsigned();
            $table->foreign('idestudiantegrupos')->references('id')->on('estudiantegrupos');
         
            $table->integer('idponderacions')->unsigned();
            $table->foreign('idponderacions')->references('id')->on('ponderacions');
            
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
        Schema::dropIfExists('notas');
    }
}
