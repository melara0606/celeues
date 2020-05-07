<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('equipo_id')->unsigned();
            $table->integer('prestamo_id')->unsigned();
            
            $table->index('equipo_id');
            $table->index('prestamo_id');

            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('prestamo_id')->references('id')->on('prestamos_docente');

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
        Schema::dropIfExists('prestamo_items');
    }
}
