<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\idioma;

use Illuminate\Support\Facades\Response;

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
		//$message = idioma::create($request->all());

   		$message= idioma::create([
    		'nombre'=> $request->input('nombre'),
    		'descripcion'=> $request->input('descripcion'),
            'estado'=> "ACTIVO",
    		]);	 
    	return Response::json('Registro Guardado Exitosamente');
 
	return redirect('/home')->with('mensaje','Registro Guardado');	
    	
    	
    }
      public function update(Request $request,$id){
        //dd($request->all());
        $message = idioma::find($id);
        $message->fill([
            'nombre'=>$request->input('nombre'),
            'descripcion'=>$request->input('descripcion'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Registro Modificado Exitosamente');
            }else
                return Response::json('No pudo Modificarse');

    }

    public function buscar($id){
        $idioma = idioma::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));    
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);  
    return Response::json($idioma);
    }

    public function cambiarEstado(Request $request,$id){
        $message = idioma::find($id);
        $message->fill([
            'estado'=>$request->input('estado'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Cambio de Estado Exitoso');
            }else
                return Response::json('No pudo cambiar de Estado');

    }
}
