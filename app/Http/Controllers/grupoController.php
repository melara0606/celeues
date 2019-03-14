<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class grupoController extends Controller
{
    //
    public function show(){
    	return view('grupos.showGrupos',[
            	 'cursos' => 1, 
            	 'numCategorias'=> 1,                
            	]);
    }
}
