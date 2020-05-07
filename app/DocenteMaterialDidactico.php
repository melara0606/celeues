<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteMaterialDidactico extends Model
{
  public function docente()
  {
    return $this->hasOne("App\docente");
  }

  public function material()
  {
    return $this->belongsTo('App\MaterialDidactico', 'material_didactico_id');
  }

  public function grupo()
  {
    return $this->belongsTo('App\grupo');
  }
}
