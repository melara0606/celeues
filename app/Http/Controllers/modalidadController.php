<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\diamodalidad;
use App\diassemana;
use App\modalidad;
//use App\noticiaInteresado;
use Illuminate\Support\Facades\Response;

class modalidadController extends Controller
{
    //
     public function show(){

     	$modalidad=modalidad::latest()->get();  
        	  return view('modalidad.showModalidad',[
            	 'modalidades' => $modalidad,      
           
        	//'noticias'=> $noticias,
            	]);
      }
}
