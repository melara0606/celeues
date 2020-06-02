<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aula;

use Illuminate\Support\Facades\Response;

class aulaController extends Controller
{
    //
     public function show(){

       $aulas=aula::latest()->get();
       
        	  return view('aulas.showAula',[
            	 'aulas' => $aulas,

        	//'noticias'=> $noticias,
              ]);
              return view('emails.mailuserpassword',[
                'user' => "kelvin",
                'password' => "kelvin",
               ]);
      }
     public function create(Request $request){//createBeneficiariosRequest $request){
		//$message = aula::create($request->all());

   		$message= aula::create([
    		'nombre'=> $request->input('nombre'),
    		'capacidad'=> $request->input('capacidad'),
        'estado'=> "ACTIVO",
    		]);
    	return Response::json('Registro Guardado Exitosamente');

	return redirect('/home')->with('mensaje','Registro Guardado');


    }
      public function update(Request $request,$id){
        //dd($request->all());
        $message = aula::find($id);
        $message->fill([
            'nombre'=>strtoupper($request->input('nombre')),
            'capacidad'=>$request->input('capacidad'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Registro Modificado Exitosamente');
            }else
                return Response::json('No pudo Modificarse');

    }

    public function buscar($id){
        $aula = aula::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);
    return Response::json($aula);
    }

    public function cambiarEstado(Request $request,$id){
        $message = aula::find($id);
        if ($request->input('estado')==0) {
            $message->fill([
            'estado'=>'INACTIVO',
            ]);
        }else if ($request->input('estado')==1) {
            $message->fill([
            'estado'=>'ACTIVO',
            ]);
        }

        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Cambio de Estado Exitoso');
            }else
                return Response::json('No pudo cambiar de Estado');

    }
}
