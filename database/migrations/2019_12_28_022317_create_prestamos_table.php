<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos_docente', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('docente_id')->unsigned();
            $table->tinyInteger('estado')->default(1);
            $table->mediumText('observaciones');
            
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->index('docente_id');
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
        Schema::dropIfExists('prestamos_docente');
    }
}
