<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->text('descripcion')->nullable()->default(null);
            $table->enum('estado',array('ACTIVO','INACTIVO'));
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
        Schema::dropIfExists('idiomas');
    }
}
