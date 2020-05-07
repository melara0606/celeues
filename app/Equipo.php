<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
  public $table = 'equipos';
  public function docente() {
    return $this->belongsToMany("App\docente");
  }
  public function tipoEquipo()
  {
    return $this->hasOne("App\TipoEquipo", 'id');
  }
}
