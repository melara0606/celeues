<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrestamoItem extends Model
{
  protected $guarded=[];
  
  public function equipo()
  {
    return $this->belongsTo('App\Equipo');
  }
}
