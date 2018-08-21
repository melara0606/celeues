<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\estudiante;

use Illuminate\Support\Facades\Response;

class estudianteController extends Controller
{
    //
     public function show(){

     	$estudiante=estudiante::latest()->get();  
        	  return view('estudiante.showEstudiante',[
            	 'estudiantes' => $estudiante,      
           
        	//'noticias'=> $noticias,
            	]);
      }
}
