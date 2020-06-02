<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudiantegrupo extends Model
{
    //
     protected $guarded=[];

    public function grupos()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(grupo::class, 'id','idgrupos');
        //return $this->hasMany(user::class,'id','idusers');
    }
    public function estudiantes()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(estudiante::class, 'id','idestudiantes');
        //return $this->hasMany(user::class,'id','idusers');
    }
    public function cursocategorias()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(cursocategoria::class, 'id','idcursocategorias');
        //return $this->hasMany(user::class,'id','idusers');
    }
    public function ponderacions()
    {   ///tablas estudiantegrupo->notas<-ponderacions accede a todo lo que tiene ponderacion y el pivote es de talbla nota
       return $this->belongsToMany(ponderacion::class,'notas','idestudiantegrupos','idponderacions')->withPivot('nota');
    }
   // public function notas()
   // {
  // // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
   //return $this->belongsToMany(nota::class,'id','idestudiantegrupos');
      
   //    return $this->belongsTo(nota::class,'id','idestudiantegrupos');
   // }

}
