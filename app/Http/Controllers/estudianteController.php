<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\estudiante;
use App\responsable;

use App\user;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;


class estudianteController extends Controller
{
    //
  static function getUserName($id){
    $message=user::find($id);
    return $message->name;
  }

  public function show(){

    $estudiante=estudiante::latest()->get();  
    return view('estudiante.showEstudiante',[
      'estudiantes' => $estudiante,      

        	//'noticias'=> $noticias,
    ]);
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
    'tipo'=> "ESTUDIANTE",
    'name'=> $request->input('usuario'),
    'email'=> $request->input('usuario'),
    'password'=> $request->input('contrasenha'),

  ]); 

        //return Response::json($message2); 

  $student=estudiante::find($request->input('estudiante_id'));
  $student->fill([ 
   'idusers'=> $message->id,
 ]);
  if($student->save()){
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
}
//return Response::json( $message);    




return response()->json(['success'=>'Record is successfully added']);


}//fin createUser

      public function create(Request $request){//createBeneficiariosRequest $request){
        if($request->input('dui')=="" && $request->input('edad') >= 18){
          return Response::json([
            'bandera' =>2,
            'response'=>'El campo dui es obligatorio',                 
          ]);
        }
        $attributes = [
          'nombre' => 'estudiante',
          'apellido' => 'apellido',
          'fechaNac' => 'fecha de nacimiento',
          'email' => 'email',
          'telefono' => 'telefono',
        ];
        $validator = \Validator::make($request->all(), [
          'nombre' => 'required|min:2',
          'apellido' => 'required|min:2',
          'email' => 'required | unique:users,email',
          'fechaNac' => 'required',
          'telefono' => 'required',
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
        if($request->input('edad') >= 18){
          $message= estudiante::create([
            'nombre'=> strtoupper($request->input('nombre')),
            'apellido'=> strtoupper($request->input('apellido')),
            'genero'=> $request->input('genero'),
            'fechaNac'=> strtoupper($request->input('fechaNac')),
            'dui'=> $request->input('dui'),
            'email'=> $request->input('email'),
            'telefono'=> $request->input('telefono'),
            'direccion'=> $request->input('direccion'),
	    		//'idresponsables'=> strtoupper($request->input('idresponsables')),

          ]);	 
        }else{
          $message= estudiante::create([
           'nombre'=> strtoupper($request->input('nombre')),
           'apellido'=> strtoupper($request->input('apellido')),
           'genero'=> $request->input('genero'),
           'fechaNac'=> strtoupper($request->input('fechaNac')),
	    		//'dui'=> $request->input('dui'),
           'email'=> $request->input('email'),
           'telefono'=> $request->input('telefono'),
           'direccion'=> $request->input('direccion'),
           'idresponsables'=> strtoupper($request->input('idresponsables')),

         ]);	
        }
        return Response::json([
          'bandera' =>1,
          'response'=>'Registro Guardado Exitosamente',                 
        ]);
    	//return Response::json('Registro Guardado Exitosamente');

        return redirect('/home')->with('mensaje','Registro Guardado');	


      }

      public function update(Request $request,$id){
        //dd($request->all());
        $message = estudiante::find($id);
        if($request->input('edad') >= 18){

         $message->fill([
           'nombre'=> strtoupper($request->input('nombre')),
           'apellido'=> strtoupper($request->input('apellido')),
           'genero'=> $request->input('genero'),
           'fechaNac'=> strtoupper($request->input('fechaNac')),
           'dui'=> $request->input('dui'),
           'email'=> $request->input('email'),
           'telefono'=> $request->input('telefono'),
           'direccion'=> $request->input('direccion'),
		    	//	'idresponsables'=> strtoupper($request->input('idresponsables')),

         ]);
       }else{  
        $message->fill([
         'nombre'=> strtoupper($request->input('nombre')),
         'apellido'=> strtoupper($request->input('apellido')),
         'genero'=> $request->input('genero'),
         'fechaNac'=> strtoupper($request->input('fechaNac')),
		    		//'dui'=> $request->input('dui'),
         'email'=> $request->input('email'),
         'telefono'=> $request->input('telefono'),
         'direccion'=> $request->input('direccion'),
         'idresponsables'=> strtoupper($request->input('idresponsables')),

       ]);
      }
      if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
       return Response::json([
        'bandera' =>1,
        'response'=>'Registro Modificado Exitosamente',                 
      ]);
     }else{
       return Response::json([
         'bandera' =>0,
         'response'=>'No pudo Modificarse',                 
       ]);
	                //return Response::json('');
     }
   }
   public function buscar($id){
    $estudiantes = estudiante::find($id);

    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));    
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);  
    return Response::json($estudiantes);
  }
     public function buscar1($id){//solo es para infomodal estudiante especificamente debido a un campo
      $estudiantes = estudiante::find($id);
      $responsable= responsable::where('id',$estudiantes->idresponsables)->get(['nombre as nombreResp']);
      if($estudiantes->idresponsables!=null){
       foreach ($responsable as $value) {
        $nombreResp=$value->nombreResp;
	        	# code...
      }

    }
    $estudiante=DB::table('estudiantes')
    ->join('responsables','estudiantes.idresponsables','=','responsables.id')
    ->select('estudiantes.*','responsables.nombre as nombreResp')
    ->where('estudiantes.id',$id)
    ->get();

    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));    
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre); 
    if($estudiantes->idresponsables!=null){
      return Response::json([
       '1' => $estudiantes,
       '2'=> $nombreResp,                 
     ]); 

    }

    return Response::json([
     '1' => $estudiantes,
     '2'=> '',                 
   ]); 
    return Response::json($responsable);
    }///finbuscar1 

    public function busquedaSelect(){
      $responsables=responsable::get(); 
      $array=array();
      $con=0;
   /* foreach($responsables as $responsable)
    {
        $array[$con]=([
        'id'=>$responsables->id,
        'nombre'=>$responsable->nombre,
        'apellido'=>$responsable->apellido,
   	//	'dui'=> $responsable->dui,
      //'email'=> strtoupper($request->input('email')),
    //	'telefono'=> $request->input('telefono'),
    //	'direccion'=> $request->input('direccion'),
        ]);  
        $con++;
      }*/
      return Response::json($responsables);  
    }
  }
