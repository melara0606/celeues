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
}
