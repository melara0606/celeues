<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaInteresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia_interesados', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('idnoticias')->unsigned()->nullable()->default(null);
            $table->foreign('idnoticias')->references('id')->on('noticias');
            
            $table->integer('idinteresados')->unsigned();
            $table->foreign('idinteresados')->references('id')->on('interesados');
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
        Schema::dropIfExists('noticia_interesados');
    }
}
