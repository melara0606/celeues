<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    //
     protected $guarded=[];
       
    public function periodos()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(periodo::class, 'id','idperiodos');
        //return $this->hasMany(user::class,'id','idusers');
    }
    public function nivels()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(nivel::class, 'id','idnivels');
        //return $this->hasMany(user::class,'id','idusers');
    }
    public function aulas()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(aula::class, 'id','idaulas');
        //return $this->hasMany(user::class,'id','idusers');
    }
     public function docentes()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(docente::class, 'id','iddocentes');
        //return $this->hasMany(user::class,'id','idusers');
    }
}
