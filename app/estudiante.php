<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\user;
class estudiante extends Model
{
    //
    
//protected $primaryKey = 'id';
    protected $guarded=[];

     public function users()
    {
    	//return $this->hasOne('App\Phone', 'foreign_key_id','local_Key');
        return $this->hasMany(user::class,'id','idusers');
    }
}
