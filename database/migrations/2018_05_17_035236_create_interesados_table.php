<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interesados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('apellido', 30);
            $table->date('fechaNac');

            //$table->string('dui', 10);
            $table->string('telefono');
            $table->string('email');

             $table->integer('idnoticias')->unsigned()->nullable()->default(null);
            $table->foreign('idnoticias')->references('id')->on('noticias');
            


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
        Schema::dropIfExists('interesados');
    }
}
