<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interesado;

class interesadoController extends Controller
{
    //
     public function show(){   
    	$interesados=interesado::latest()->paginate(8);  
    	 //  return view('interesados.showInteresados',[
    		//'interesados'=> $beneficiarios,
    	//	]);
    }
    
    public function create(Request $request)//createBeneficiariosRequest $request){
    	//$message= beneficiario::create($request->all());
		//$response = socio::create($request->all());	
   	$message= interesado::create([
    		'nombre'=> $request->input('nombre'),
    		'apellido'=> $request->input('apellido'),
    		'fechaNac'=> $request->input('fechaNac'),
    		'dui'=> $request->input('dui'),
    		'direccion'=> $request->input('direccion'),
    		'telefono'=> $request->input('telefono'),
    		'email'=> $request->input('email'),
    		'apodo'=> $request->input('apodo'),
    		'tipoSocio'=> $request->input('tipoSocio'),
    		'cargo'=> $request->input('cargo'),
            'estado'=>'Activo',
    		]);	 
    	return Response::json($message);
    	
    	
    	return redirect('/socios')->with('mensaje','Registro Guardado');
    }
    public function update(createBeneficiariosRequest $request,$id){
    	//dd($request->all());
    	$message = beneficiario::find($id);
    	 $message->fill($request->all());
    	$message->save();
    	return Response::json($message);
    	//return response(json($array));
    }

    public function buscar($id){
    $beneficiario = beneficiario::find($id);
    return Response::json($beneficiario);
    } 
}
