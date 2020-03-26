<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\estudiante;


class User extends Authenticatable
{
    use Notifiable;
//protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function estudiantes()
    {

   // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
        return $this->belongsTo(estudiante::class,'id','idusers');
    }
}
