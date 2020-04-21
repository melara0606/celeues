<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interesado extends Model
{
    //
    protected $guarded=[];
    public function noticias()
    {
    	//return $this->hasOne(periodo::class, 'foreign_key_id','local_Key');
        return $this->hasOne(noticias::class, 'id','idnoticias');
        //return $this->hasMany(user::class,'id','idusers');
    }
}
