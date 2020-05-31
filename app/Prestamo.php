<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
  protected $guarded=[];
  public $table = 'prestamos_docente';

  public function detalle()
  {
    return $this->hasOne("App\PrestamoDetalle"); 
  }

  public function items()
  {
    return $this->hasMany("App\PrestamoItem");
  }
}
