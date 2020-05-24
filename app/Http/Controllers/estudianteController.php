<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\estudiante;
use App\responsable;

use App\user;

use App\grupo;

use App\estudiantegrupo;
use App\nota;

use App\idioma;

use App\noticia;

use App\interesado;
use App\Mail\MailUserPassword;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use DateTime;
class estudianteController extends Controller
{
    /** Funcion que obtiene numero de anhos
      ** Parametro: fechaNacimiento.
    **/
   public static function getNumberYears($fechaNac){
    //  $d1 = new DateTime('2011-03-12');
    //  $d2 = new DateTime('2008-03-09');
       $date1 = "2007-03-24";
       $date2 = "2009-06-26";
      $date2=date('Y/m/d');// new DateTime();

      $diff = abs(strtotime($date2) - strtotime($fechaNac));

      $years = floor($diff / (365*60*60*24));
      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

      //printf("%d years, %d months, %d days\n", $years, $months, $days);
      return $years." anhos";
  }

  /** Funcion que obtiene nombre de Usuario
    ** Parametro: id.
  **/
  public static function getUserName($id){

        //$message=user::find($id);
        $msj="";
        if(count(estudiante::find($id)->users()->get())>0){
        $message=estudiante::find($id)->users()->first();//->first();
        $msj=$message->name;
      } 

      return $msj;
  }
  
  /** Funcion que muestra Vista de Estudiantes a blade.php
    ** 
  **/
  public function show(){
/* $estudiante=estudiante::find(2);

 $users=user::find(3);

 return response()->json([
     'a' =>$users,//;->where('idusers',1)->get()->nombre(),
 //    'b' =>$estudiante,
   'x' =>$users->estudiantes()->get(),//->where('idddusers',2)->first(),
 //'x2' =>$estudiante->users()->first(),//->where('idusersss',1)->get(),//;->where('idusers',1)->first(),
    
    // 'y' =>$estudiante->users(),

  ]);
*/
    $estudiante=estudiante::latest()->get();  
    return view('estudiante.showEstudiante',[
      'estudiantes' => $estudiante,      

        	//'noticias'=> $noticias,
    ]);
  }

  /** Funcion que Crea un Usuario
    ** Parametro: id.
  **/
  public function createUser(Request $request){
  //  $var=array('user'=> $request->input('usuario'),'password'=>$request->input('contrasenha'));
    //    return Response::json($var['user']);
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
    'password'=> bcrypt($request->input('contrasenha')),

  ]); 

        //return Response::json($message2); 

  $student=estudiante::find($request->input('estudiante_id'));
  $student->fill([ 
   'idusers'=> $message->id,
 ]);
  if($student->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
      //return view('email.mail',['kelvin'=>'dsfdsf']);
      $user=array('user'=> $request->input('usuario'),'password'=>$request->input('contrasenha'));
      //return Response::json($var);
 
    //  return  view(new Mailtrap())
         Mail::to($request->input('usuario'))->send(new MailUserPassword($user));
         //https://www.youtube.com/watch?v=cc6czaoxe4M
   
    return Response::json([
    'bandera' =>1,
    'response'=>'Usuario Creado y correo enviado Exitosamente',                 
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


  /** Funcion que Guarda Estudiante
    ** Parametro: Request  son datos de estudiantes.
  **/
      public function create(Request $request){//createBeneficiariosRequest $request){
        if($request->input('dui')=="" && $request->input('edad') >= 18){
          return Response::json([
            'bandera' =>2,
            'response'=>'El campo dui es obligatorio',                 
          ]);
        }

        if($request->input('edad') >= 18){
          $attributes = [
            'nombre' => 'estudiante',
            'apellido' => 'apellido',
            'fechaNac' => 'fecha de nacimiento',
            'email' => 'email',
            'telefono' => 'telefono',
            'dui' => 'dui',
          ];
          $validator = \Validator::make($request->all(), [
            'nombre' => 'required|min:2',
            'apellido' => 'required|min:2',
            'email' => 'required | unique:estudiantes,email',
            'fechaNac' => 'required',
            'telefono' => 'required',
            'dui' => 'required | unique:estudiantes,dui',
          ], [
                     // 'usuario.unique' => 'El usuario '.$request->input('usuario').' ya esta en uso',
          ]
          , $attributes);
        }else{
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
            'email' => 'required | unique:estudiantes,email',
            'fechaNac' => 'required',
            'telefono' => 'required',
          ], [
                     // 'usuario.unique' => 'El usuario '.$request->input('usuario').' ya esta en uso',
          ]
          , $attributes); 
        }

          /////////////////////////////////////////////////////////////////////
        if ($validator->fails())
        {
          return response()->json([
           'bandera' =>3,
           'errors'=>$validator->errors()->all(),
         ]);
        }
         //----------// TRNSACCION //----------/
       DB::beginTransaction();
       try{ 
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
        //-----  registro desde Pantalla de Interesado a Estudiante  -----//
        if(!empty($request->input('idInteresado')) || $request->input('idInteresado')>0 ){
          $idinteresado=$request->input('idInteresado');
            $interesado=interesado::find($idinteresado);
            $interesado->fill([
              'estado'=> 'REGISTRADO',
              
            ]);
            if($interesado->save()){
                  $noticia=noticia::find($interesado->idnoticias);
                  $count=count(interesado::where('estado','REGISTRADO')->get()); 
                  $noticia->fill([
                    'numRegistrados'=> $count,
                    
                  ]);
                if($noticia->save()){
                   
                }else{
                   DB::rollback();
                }

            }else{
              DB::rollback();
              return Response::json([
                'bandera' =>2,
                'response'=>'No pudo modificar interesado',                 
              ]);
                          //return Response::json('');
            }

        }
        //-------------------------------------------------------------------//
        DB::commit();
        return Response::json([
          'bandera' =>1,
          'response'=>'Registro Guardado Exitosamente',                 
        ]);
      //return Response::json('Registro Guardado Exitosamente');
      } catch (\Throwable $e) {
            DB::rollback();
            return Response::json([
              'bandera' =>2,
              'response'=>'error en registrar a la BD ',                 
            ]);
           
          
      }////fin catch

        //return redirect('/home')->with('mensaje','Registro Guardado');	


    }



  /** Funcion que Acctuliza Estudiante
    ** Parametro: Request  son datos de estudiantes.
    ** Parametro: id ==>id del estudiante
  **/
      public function update(Request $request,$id){
        //dd($request->all());
       /* return Response::json([
        'bandera' =>$request->all(),                
      ]); */

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
           'direccion'=> $request->input('direccion')
		    		//'idresponsables'=>null,// strtoupper($request->input('idresponsables')),

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


    public function showRecord($id){
      $estudiante=estudiante::find($id);
      $estudiantegrupos=estudiantegrupo::Where('estudiantegrupos.idestudiantes',$estudiante->id)
      ->leftJoin('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
      ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
      ->select('estudiantegrupos.*')
      ->orderBy('nivels.numNivel','ASC')
      ->orderBy('grupos.numGrupo','ASC')
      ->get();
      $idiomas=idioma::where('estado','ACTIVO')->get();
      //$estudiantegrupos=estudiantegrupo::Where('idestudiantes',$estudiante->id)->get();//asi funciona sin relacion
      //return Response::json($estudiantegrupos); 
      if(count($estudiantegrupos)>0){
        $ididioma=$estudiantegrupos->first()->grupos->nivels->ididiomas;
      }else{
        $ididioma=1;
      }
      return view('estudiante.showRecord',[
        'estudiantegrupos' => $estudiantegrupos, 
        'estudiante'=>$estudiante,
        'idiomas' => $idiomas, 
        'ididioma'=> $ididioma,
            //'noticias'=> $noticias,
      ]);
    }
    public function showRecordParametro($id,$idioma){
      $idioma=idioma::where('nombre',$idioma)->get()->first();
      $estudiante=estudiante::find($id);
      $estudiantegrupos=estudiantegrupo::Where('idestudiantes',$estudiante->id)
      ->leftJoin('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
      ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
      ->select('estudiantegrupos.*')
      ->where('nivels.ididiomas',$idioma->id)
      ->orderBy('nivels.numNivel','ASC')
      ->orderBy('grupos.numGrupo','ASC')
      ->get();
      $idiomas=idioma::where('estado','ACTIVO')->get();
      //$estudiantegrupos=estudiantegrupo::Where('idestudiantes',$estudiante->id)->get();//asi funciona sin relacion
      //return Response::json($estudiantegrupos->first()->grupos->nivels->idiomas);  
      return view('estudiante.showRecord',[
        'estudiantegrupos' => $estudiantegrupos, 
        'estudiante'=>$estudiante,
        'idiomas' => $idiomas,   
        'ididioma'=> $idioma->id,
            //'noticias'=> $noticias,
      ]);
    }
    public function showRecordNotas($idestudiantegrupo){
    //  $notas=nota::where('idestudiantegrupos',$idestudiantegrupo)->join('')->get();
      $notas=DB::table('notas')
        ->join('ponderacions','notas.idponderacions','=','ponderacions.id')
        ->select('ponderacions.*','notas.nota')
        ->where('notas.idestudiantegrupos',$idestudiantegrupo)
        ->orderBy('ponderacions.correlativo','ASC')
        ->get();
        $notaFinal=estudiantegrupo::find($idestudiantegrupo);
      return Response::json([
        'notas'=>$notas,
        'notaFinal'=>$notaFinal,
        
      ]);  


    }

  }
