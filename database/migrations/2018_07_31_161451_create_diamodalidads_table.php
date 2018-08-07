<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiamodalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diamodalidads', function (Blueprint $table) {
            $table->increments('id');
            $table->time('horaInicio')->nullable()->default(null);
            $table->time('horaFin')->nullable()->default(null);

            $table->integer('idmodalidads')->unsigned()->nullable()->default(null);
            $table->foreign('idmodalidads')->references('id')->on('modalidads');
            
            $table->integer('iddiassemanas')->unsigned()->nullable()->default(null);
            $table->foreign('iddiassemanas')->references('id')->on('diassemanas');
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
        Schema::dropIfExists('diamodalidads');
    }
}
