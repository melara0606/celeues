<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteMaterialDidacticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_material_didacticos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("grupo_id");
            $table->unsignedInteger("docente_id");
            $table->unsignedInteger("material_didactico_id");
            $table->tinyInteger('estado')->default(1);
            /* $table->date('entrega')->nullable();
            $table->text('observacion')->nullable(); */

            $table->foreign("docente_id")->references('id')->on('docentes');
            $table->foreign("material_didactico_id")->references('id')->on('material_didacticos');
            $table->foreign("grupo_id")->references("id")->on('grupos');
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
        Schema::dropIfExists('docente_material_didacticos');
    }
}
