<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonderacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponderacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('correlativo');
            $table->string('nombreEvaluacion');
            $table->integer('ponderacion');

             $table->integer('idgrupos')->unsigned();
            $table->foreign('idgrupos')->references('id')->on('grupos');
    
                
            
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
        Schema::dropIfExists('ponderacions');
    }
}
