<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\idioma;

class idiomaController extends Controller
{
    //
     public function show(){

     	$idiomas=idioma::latest()->get();  
        	  return view('configuracion.showIdioma',[
            	 'idiomas' => $idiomas,      
           
        	//'noticias'=> $noticias,
            	]);
      }
     public function create(Request $request){//createBeneficiariosRequest $request){
    	//$message= beneficiario::create($request->all());
		//$response = socio::create($request->all());

   		$message= idioma::create([
    		'nombre'=> $request->input('nombre'),
    		'descripcion'=> $request->input('descripcion'),
    		]);	 
    	return Response::json($message);
 
	return redirect('/home')->with('mensaje','Registro Guardado');	
    	
    	
    }

}
