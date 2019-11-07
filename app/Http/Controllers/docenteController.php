<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docente;
use App\Http\Request\JonaRequest;
use Illuminate\Support\Facades\Response;

use App\user;
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
      $x=$request->input('genero');
      $genero="";
      if($x =='0'){
        $genero="MASCULINO";
      }else{
        $genero="FEMENINO";
      }
      //  return Response::json($genero);

   		$message= docente::create([
    		'nombre'=> $request->input('nombre'),
    		'apellido'=> $request->input('apellido'),
        'email'=> $request->input('email'),
        'dui'=> $request->input('dui'),
        'genero'=> $genero,
        'nit'=> $request->input('nit'),
        'telefono'=> $request->input('telefono'),
        'ncuenta'=> $request->input('ncuenta'),

    		]);
    	return Response::json('Registro Guardado Exitosamente');

	return redirect('/home')->with('mensaje','Registro Guardado');


    }
      public function update(Request $request,$id){
        //dd($request->al0l());

        $message = docente::find($id);
        $message->fill([
            'nombre'=>$request->input('nombre'),
            'apellido'=>$request->input('apellido'),
            'email'=>$request->input('email'),
            'dui'=>$request->input('dui'),
            'genero'=> $request->input('genero'),
            'nit'=> $request->input('nit'),
            'telefono'=>$request->input('telefono'),
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

    public function createUser(Request $request){
// lo encontre aca https://gilbitron.me/blog/laravel-custom-validation-attributes/
        $attributes = [
          'usuario' => 'Usuario',
          'contrasenha' => 'Contraseña',
          'repetirContrasenha' => 'Comprobar Contraseña',
              
        ];
         $validator = \Validator::make($request->all(), [
            'usuario' => 'required | unique:users,email',
            'contrasenha' => 'required|min:3',
            'repetirContrasenha' => 'required|same:contrasenha',
        ], [
          'usuario.unique' => 'El usuario '.$request->input('usuario').' ya esta en uso',
         ]
        , $attributes);
///////////////////////////////////////////////////////////////////////
         ///con propias reglas de msj
/* $validator = \Validator::make($request->all(), [
            'usuario' => 'required',
            'contrasenha' => 'required|min:3',
            'repetirContrasenha' => 'required|same:contrasenha',
        ],[
    //'required' => 'Por favor llenar los campos vacios.',
    'usuario.required' => 'Por favor llenar campo usuario.',
    //'contrasenha.required' => 'Por favor llenar el campo contrasena.',
    'repetirContrasenha.required' => 'llenar el campo rapetir contrasena.',

    'repetirContrasenha.same' => 'El campo contrasena no coincide con repetir contrasena.',
]);//);*/
/////////////////////////////////////////////////////////////////////
        if ($validator->fails())
        {
            return response()->json([
               'bandera' =>3,
              'errors'=>$validator->errors()->all(),
            ]);
        }
        $message=user::create([
          'tipo'=> "DOCENTE",
          'name'=> $request->input('usuario'),
          'email'=> $request->input('usuario'),
          'password'=> $request->input('contrasenha'),
          
          ]); 
        
        //return Response::json($message2); 

        $docente=docente::find($request->input('estudiante_id'));
         $docente->fill([ 
           'idusers'=> $message->id,
         ]);
         if($docente->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
           return Response::json([
            'bandera' =>1,
            'response'=>'Usuario Creado Exitosamente',                 
           ]);
            }else{
                return Response::json([
              'bandera' =>0,
              'response'=>'No pudo crear usuario',                 
             ]);
                  //return Response::json('');
             }///fin else

}//fin createUser



}
