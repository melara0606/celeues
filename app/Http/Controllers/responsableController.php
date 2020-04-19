<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\responsable;

use Illuminate\Support\Facades\Response;

class responsableController extends Controller
{
    //
    public function show(){

     	$responsable=responsable::latest()->get();  
        	  return view('responsable.showResponsable',[
            	 'responsables' => $responsable,      
           
        	//'noticias'=> $noticias,
            	]);
      }

    public function create(Request $request){//createBeneficiariosRequest $request){
        $attributes = [
            'nombre' => 'nombre',
            'apellido' => 'apellido',
           // 'email' => 'email',
            'telefono' => 'telefono',

            'dui' => 'dui',
        ];
        $validator = \Validator::make($request->all(), [
            'nombre' => 'required|min:2',
            'apellido' => 'required|min:2',
            'dui' => 'required | unique:users,email',
            'telefono' => 'required',
           // 'email' => 'required',
        ], [
         // 'usuario.unique' => 'El usuario '.$request->input('usuario').' ya esta en uso',
        ]
        , $attributes);

/////////////////////////////////////////////////////////////////////
        if ($validator->fails())
        {
            return response()->json([
             'bandera' =>3,
             'errors'=>$validator->errors()->all(),
         ]);
        }
//////////////////////////////////////////////////////////////////////   
   		$message= responsable::create([
    		'nombre'=> strtoupper($request->input('nombre')),
    		'apellido'=> strtoupper($request->input('apellido')),
    		'dui'=> strtoupper($request->input('dui')),
    		//'email'=> strtoupper($request->input('email')),
    		'telefono'=> $request->input('telefono'),
    		'direccion'=> $request->input('direccion'),
    		]);	 
   		return Response::json([
            'bandera' =>1,
            'response'=>'Registro Guardado Exitosamente',                 
    ]);
    	//return Response::json('Registro Guardado Exitosamente');
 
	return redirect('/home')->with('mensaje','Registro Guardado');	
    	
    	
    }
    public function update(Request $request,$id){
        //dd($request->all());
        $message = responsable::find($id);
        $message->fill([
           	'nombre'=> strtoupper($request->input('nombre')),
    		'apellido'=> strtoupper($request->input('apellido')),
    		'dui'=> strtoupper($request->input('dui')),
    		//'email'=> strtoupper($request->input('email')),
    		'telefono'=> $request->input('telefono'),
    		'direccion'=> $request->input('direccion'),
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
        $responsable = responsable::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));    
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);  
    return Response::json($responsable);
    }


}
