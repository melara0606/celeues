<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiassemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diassemanas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('acronimo',5);
           // $table->int('numeroDia');
           // $table->time('horaInicio')->nullable()->default(null);
           // $table->time('horaFin')->nullable()->default(null);
            
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
        Schema::dropIfExists('diassemanas');
    }
}
