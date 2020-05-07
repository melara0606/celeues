<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    protected $fillable = [];

    public function equipo()
    {
        return $this->belongsTo('App\Equipo');
    }

    public function docente()
    {
        return $this->hasOne('App\docente');
    }
}
