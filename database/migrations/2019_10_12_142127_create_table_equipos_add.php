<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEquiposAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo', 15);
          $table->text('description');
          $table->string("marca", 60);
          $table->string("modelo", 60);
          $table->string("nserie", 60);
          $table->dateTime("fechaAd");
          $table->tinyInteger('estado');
          $table->double("precio", 8, 2);
          $table->string("observacion", 100);
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
        Schema::dropIfExists('equipos');
    }
}
