<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionesPonderaciones extends Model
{
    public function evaluacion()
    {
        return $this->belongsTo("App\Evaluaciones");
    }
}
