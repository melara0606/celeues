<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialDidacticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('material_didacticos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer("idioma_id")->unsigned()->index();
        $table->integer("categoria_id")->unsigned()->index();
        $table->integer("nivel_id")->unsigned()->index();

        $table->string("codigo", 10);
        $table->string("titulo", 50);
        $table->string("edicion", 50);
        $table->string("autor", 50);
        $table->string("editorial", 50);
        $table->double("costo", 8, 2);
        $table->tinyInteger("is_cd");
        $table->date("fechaAd");
        $table->tinyInteger("is_donado");
        $table->tinyInteger("tipo_material");
        $table->tinyInteger("estado")->default(1);
        $table->text("observaciones");

        $table->foreign("idioma_id")->references("id")->on("idiomas");
        $table->foreign("categoria_id")->references("id")->on("categorias");
        // $table->foreign("nivel_id")->references("id")->on("nivels");
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
        Schema::dropIfExists('material_didacticos');
    }
}
