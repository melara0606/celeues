<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\nivel;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class nivelController extends Controller
{
    //
    public function create(Request $request){
    	$countnivel=count(nivel::where('numNivel',$request->input('numNivel'))
    	->where('idcursocategorias',$request->input('idcursocategorias'))->get());
    	if($request->input('numNivel')==""){
    		 return Response::json([
	            'bandera' =>0,
	            'response'=>'Ingrese un numero de nivel',
	           // 'nivel'=>$countnivel                 
	   			 ]);
    	}

    	  
    	 if($countnivel==0){
		    	$message=nivel::create([
		    		'numNivel'=>$request->input('numNivel'),
		    		'ididiomas'=>$request->input('ididiomas'),
		    		'idcategorias'=>$request->input('idcategorias'),
		    		'idmodalidads'=>$request->input('idmodalidads'),
		    		'estado'=>'ACTIVO',
		    		'idcursos'=>$request->input('idcursos'),
		    		'idcursocategorias'=>$request->input('idcursocategorias'),
		    	]);
		    	return Response::json([
           	 	'bandera' =>1,
            	'response'=>'Nivel Insertado exitosamente',
           		//'nivel'=>$countnivel                 
   			 	]); 

		   }else{
		   		 return Response::json([
	            'bandera' =>0,
	            'response'=>'Ya existe un registo con nivel '.$request->input('numNivel'),
	           // 'nivel'=>$countnivel                 
	   			 ]);
		   }
    }
    public function cambiarEstado(Request $request,$id){
        $message = nivel::find($id);
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
                
             return Response::json([
            'bandera' =>1,
            'response'=>'Cambio de Estado Exitoso',                 
   			 ]);
            }else{
                return Response::json('No pudo cambiar de Estado');
                 return Response::json([
            		'bandera' =>0,
            		'response'=>'No pudo cambiar de Estado',                 
   			 		]);
           
            }

    }

    public function eliminar(Request $request,$id){
   
   		} 

}
