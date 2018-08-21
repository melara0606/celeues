<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docente;

use Illuminate\Support\Facades\Response;

class docenteController extends Controller
{
    //
     public function show(){

     	$docentes=docente::latest()->get();
        	  return view('docentes.showDocente',[
            	 'docentes' => $docentes,

        	//'noticias'=> $noticias,
            	]);
      }
     public function create(Request $request){//createBeneficiariosRequest $request){
		//$message = idioma::create($request->all());

   		$message= docente::create([
    		'nombre'=> $request->input('nombre'),
    		'apellido'=> $request->input('apellido'),
        'email'=> $request->input('email'),
        'dui'=> $request->input('dui'),
        'telefono'=> $request->input('telefono'),
        'nit'=> $request->input('nit'),
        'ncuenta'=> $request->input('ncuenta'),

    		]);
    	return Response::json('Registro Guardado Exitosamente');

	return redirect('/home')->with('mensaje','Registro Guardado');


    }
      public function update(Request $request,$id){
        //dd($request->all());
        $message = docente::find($id);
        $message->fill([
            'nombre'=>$request->input('nombre'),
            'apellido'=>$request->input('apellido'),
            'email'=>$request->input('email'),
            'dui'=>$request->input('dui'),
            'telefono'=>$request->input('telefono'),
            'nit'=> $request->input('nit'),
            'ncuenta'=> $request->input('ncuenta'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Registro Modificado Exitosamente');
            }else
                return Response::json('No pudo Modificarse');

    }

    public function buscar($id){
        $docente = docente::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);
    return Response::json($docente);
    }

    public function cambiarEstado(Request $request,$id){
        $message = docente::find($id);
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
