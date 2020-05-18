<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivel extends Model
{
    //
    protected $guarded=[];
   

    public function idiomas()
    {
    	  return $this->hasOne(idioma::class, 'id','ididiomas');
    }
    public function categorias()
    {
        return $this->hasOne(categoria::class, 'id','idcategorias');
    }

    public function modalidad()
    {
        return $this->belongsTo('App\modalidad', 'idmodalidads');
    }
}
