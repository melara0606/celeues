<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
  public function items()
  {
    return $this->hasMany("App\EvaluacionesPonderaciones", "evalucion_id");
  }
}
