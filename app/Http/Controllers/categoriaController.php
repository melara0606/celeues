<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;

use Illuminate\Support\Facades\Response;

class categoriaController extends Controller
{
    //
    public function show(){

     	$categoria=categoria::latest()->get();  
        	  return view('categoria.showCategoria',[
            	 'categorias' => $categoria,      
           
        	//'noticias'=> $noticias,
            	]);
      }

     public function create(Request $request){//createBeneficiariosRequest $request){
		//$message = idioma::create($request->all());
		$cont0=categoria::where('edadInicio','<=',$request->input('edadInicio'))
		->where('edadFin','>=',$request->input('edadInicio'))
		->count();
		$cont1=categoria::where('edadInicio','<=',$request->input('edadFin'))
		->where('edadFin','>=',$request->input('edadFin'))
		->count();
		//return Response::json($cont0.' cont1='.$cont1);

		if($cont0!=0 || $cont1!=0)
		return Response::json([
            'bandera' =>0,
            'response'=>'Ya existe un registro con esos rangos de edades',                 
    ]);


   		$message= categoria::create([
    		'nombre'=> strtoupper($request->input('nombre')),
    		'descripcion'=> $request->input('descripcion'),
            'edadInicio'=> $request->input('edadInicio'),
            'edadFin'=> $request->input('edadFin'),
            
    		]);	 
    	return Response::json([
            'bandera' =>1,
            'response'=>'Registro Guardado Exitosamente',                 
    ]);
 
	return redirect('/home')->with('mensaje','Registro Guardado');	
    	
    	
    }
      public function update(Request $request,$id){
        //dd($request->all());
        $message = categoria::find($id);
        $cont0=categoria::where('edadInicio','<=',$request->input('edadInicio'))
		->where('edadFin','>=',$request->input('edadInicio'))
		->count();
		$cont1=categoria::where('edadInicio','<=',$request->input('edadFin'))
		->where('edadFin','>=',$request->input('edadFin'))
		->count();
		//return Response::json($cont0.' cont1='.$cont1);

		if($cont0!=0 || $cont1!=0 || $cont0->id!=$id || $cont1->id!=$id )
		return Response::json([
            'bandera' =>0,
            'response'=>'Ya existe un registro con esos rangos de edades',                 
    ]);
        
        $message->fill([
           'nombre'=> strtoupper($request->input('nombre')),
    		'descripcion'=> $request->input('descripcion'),
            'edadInicio'=> $request->input('edadInicio'),
            'edadFin'=> $request->input('edadFin'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json([
            'bandera' =>1,
            'response'=>'Registro Guardado Exitosamente',                 
    ]);
            }else
                return Response::json('No pudo Modificarse');

    }
    public function buscar($id){
        $categoria = categoria::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));    
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);  
    return Response::json($categoria);
    }

     
}
