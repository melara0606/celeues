<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modalidad;

use Illuminate\Support\Facades\Response;

class modalidadController extends Controller
{
    //
     public function show(){

     	$modalidades=modalidad::latest()->get();
        	  return view('modalidad.showModalidad',[
            	 'modalidades' => $modalidades,

        	//'noticias'=> $noticias,
            	]);
      }
     public function create(Request $request){//createBeneficiariosRequest $request){
		//$message = idioma::create($request->all());

   		$message= modalidad::create([
    		'nombre'=> strtoupper($request->input('nombre')),
    		'turno'=> $request->input('turno'),
          
    		]);
    	return Response::json('Registro Guardado Exitosamente');

	return redirect('/home')->with('mensaje','Registro Guardado');


    }
      public function update(Request $request,$id){
        //dd($request->all());
        $message = modalidad::find($id);
        $message->fill([
            'nombre'=>strtoupper($request->input('nombre')),
            'turno'=>$request->input('turno'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Registro Modificado Exitosamente');
            }else
                return Response::json('No pudo Modificarse');

    }

    public function buscar($id){
        $modalidades = modalidad::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);
    return Response::json($modalidades);
    }

    public function cambiarEstado(Request $request,$id){
        $message = modalidad::find($id);
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
