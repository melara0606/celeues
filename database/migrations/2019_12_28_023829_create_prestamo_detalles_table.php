<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo_detalles', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('prestamo_id')->unsigned();
            $table->string('dui', 12);
            $table->string('nombres', 60);
            $table->string('apellidos', 60);

            $table->foreign('prestamo_id')->references('id')->on('prestamos_docente');
            $table->index('prestamo_id');

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
        Schema::dropIfExists('prestamo_detalles');
    }
}
