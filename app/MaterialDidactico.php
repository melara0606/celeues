<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialDidactico extends Model
{
    public function idioma()
    {
        return $this->belongsTo("App\idioma");
    }

    public function categoria()
    {
        return $this->belongsTo("App\categoria", 'categoria_id');
    }
}
