<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    public function equipo()
    {
        return $this->belongsToMany('App\Equipo');
    }

    public function prestamos()
    {
        return $this->belongsToMany('App\Prestamos');
    }
}
