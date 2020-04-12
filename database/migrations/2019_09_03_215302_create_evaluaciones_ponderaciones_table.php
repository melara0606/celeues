<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesPonderacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_ponderaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evalucion_id')->unsigned()->nullable(false);
            $table->text("titulo", 60);
            $table->integer("ponderacion");

            $table->foreign("evalucion_id")->references('id')->on('evaluaciones');
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
        Schema::dropIfExists('evaluaciones_ponderaciones');
    }
}
