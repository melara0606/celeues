<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docente;

use App\estudiante;
use App\estudiantegrupo;
use App\idioma;

use App\Prestamos;
use App\MaterialDidactico;
use App\DocenteMaterialDidactico;
use App\Http\Request\JonaRequest;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\DB;
use App\user;
use App\grupo;
use App\Equipo;

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
        'estado'=>'INACTIVO'

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
          'password'=> bcrypt($request->input('contrasenha')),
          
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

public function showGrupos($id){
      $docente=docente::find($id);
      // $estudiante=estudiante::find($id);
      $estudiantegrupos=estudiantegrupo::Where('grupos.iddocentes',$docente->id)
      ->leftJoin('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
      ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
      ->select('estudiantegrupos.*','grupos.*')
      ->orderBy('nivels.numNivel','ASC')
      ->orderBy('grupos.numGrupo','ASC')
      ->get();
      $grupos=grupo::where('iddocentes',$docente->id)
      ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
      ->select('grupos.*')
      ->orderBy('nivels.numNivel','ASC')
      ->orderBy('grupos.numGrupo','ASC')
      ->get();
      //$grupos=grupo::where()s
      $idiomas=idioma::where('estado','ACTIVO')->get();
      //$estudiantegrupos=estudiantegrupo::Where('idestudiantes',$estudiante->id)->get();//asi funciona sin relacion
     // return Response::json($grupos); 
      //if(count($estudiantegrupos)>0){
    if(count($grupos)>0){
    //    $ididioma=$estudiantegrupos->first()->grupos->nivels->ididiomas;
        $ididioma=$grupos->first()->nivels->ididiomas;
     
      }else{
        $ididioma=1;
      }
      return view('docentes.showListGruposDocente',[
        'grupos'=>$grupos,
        //'estudiantegrupos' => $estudiantegrupos, 
        'docente'=>$docente,
        'idiomas' => $idiomas, 
        'ididioma'=> $ididioma,
            //'noticias'=> $noticias,
      ]);
    }

// public function showGruposParametro($id,$idioma){

// }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//---------------------------------CODIGO MELARA------------------------------------------------//
  public function showData($id)
  {
    $docente = docente::find($id);
    $grupo = grupo::where('iddocentes', $id)->get();
    $equipos  = DB::table("equipos")
      ->select("equipos.id as equipoId", "equipos.codigo", "equipos.marca", "equipos.modelo", "equipos.description", "equipos.observacion")
      ->where('equipos.estado', 1)
      ->get();

    $prestamos = Prestamos::where('docente_id', $id)->where('estado', 1)->get();
    return view('docentes.detail', compact("docente", "equipos", "prestamos", "grupo"));
  }

  public function addEquipoDocente(Request $request)
  {
    $params   = $request->all();
    $docente  = docente::find($params['docente']);

    if(count($docente->equipo) == 0) {
      $equipo   = Equipo::find($params['equipo']);
      $result = $docente->equipo()->save($equipo);
      $equipo->estado = 2;
      $equipo->save(); 

      if($result) {
        return json_encode([
          'ok'    => true
        ]);
      }else {
        return response()->json([
          'error' => 'Tenemos un problema para la insercion'
        ], 500);
      }
    }

    return response()->json([
      'error' => 'El docente ya tiene un equipo asignado'
    ], 500);
  }

  public function addEquipoPrestamo(Request $request)
  {
    $params = $request->all();

    $pediente = Prestamos::where('docente_id', $params['docente'])
                      ->where('equipo_id', $params['equipo'])
                      ->where('estado', 1)
                      ->get();

    if(count($pediente) == 0) {
      $prestamo = new Prestamos;
      $prestamo->equipo_id  = $params['equipo'];
      $prestamo->docente_id = $params['docente'];
      $prestamo->observaciones = '';
      $result = $prestamo->save();

      if($result) {
        return json_encode([
          'ok'    => true
        ]);
      } else {
        return response()->json([
          'error' => 'Tenemos un problema para la insercion'
        ], 500);
      }
    }

    return response()->json([
      'error' => 'Tienes pediente un pedido, debes entregar primero este equipo ...'
    ], 500);
  }

  public function entregarEquipo(Request $request)
  {
    $params = $request->all();
    $prestamo = Prestamos::find($params['codigo']);
    if(isset($params['codigo'])) {
        $prestamo = Prestamos::find($params['codigo']);
        $prestamo->estado = 0;
        $prestamo->updated_at = \Carbon\Carbon::now();
        $prestamo->observaciones = $params['observaciones'] ? $params['observaciones'] : 'N/A';
        $result = $prestamo->save();
      
        if(isset($params['estado'])) {
          $equipo = Equipo::find($prestamo->equipo->id);
          $equipo->observacion = $params['observacion'];
          $equipo->estado = 0;
          $equipo->docente()->detach();
          $equipo->save();
        }

      if($result) {
        return json_encode([
          'ok'    => true
        ]);
      }else {
        return response()->json([
          'error' => 'Tenemos un problema por el momento, prueba mas tarde'
        ], 500);
      }
    }
  }

  public function deleteEquipo(Request $request)
  {
    $params = $request->all();
    if(isset($params)) {
      $result = DB::table("docente_equipo")
        ->where("equipo_id", $params['equipo_id'])
        ->where('docente_id', $params['docente_id'])
        ->delete();

      if($result) {
        return json_encode([
          'ok'    => true
        ]);
      }else {
        return response()->json([
          'error' => 'Tenemos un problema por el momento, prueba mas tarde'
        ], 500);
      }
    }
  }

  public function viewHistoryPrestamo($id)
  {
    $docente = docente::find($id);
    $prestamos = Prestamos::where("docente_id", $id)
      ->orderBy('estado', 'desc')
      ->orderBy('updated_at', 'desc')
      ->get();
    return view('docentes.history', compact("prestamos", "id", 'docente'));
  }

  public function viewHistoryMaterial($id)
  {
    $docente = docente::find($id);
    $prestamos = DocenteMaterialDidactico::where("docente_id", $id)
      ->orderBy('estado', 'desc')
      ->orderBy('updated_at', 'desc')
      ->get();
    // dd($prestamos);
    return view('docentes.history-materiales', compact("prestamos", "id", 'docente'));
  }

  public function materiales(Request $request, $id)
  {
  $grupo = null;
  $docente = docente::find($id);
  $query = $request->query('query');
  $grupos = DB::select(DB::raw("SELECT g.id, g.estado, c.nombre  as categoria, i.nombre as nombreIdioma, n.numNivel, m.nombre, m.turno FROM grupos as g inner join nivels as n on g.idnivels = n.id inner join categorias as c on c.id = n.idcategorias inner join idiomas as i on i.id = n.ididiomas INNER join modalidads as m on m.id = n.idmodalidads where g.iddocentes = ".$id));

  if (isset($query)) {
    $grupo = DB::select(DB::raw("SELECT i.id as idiomaId, g.id, g.estado, c.nombre  as categoria, i.nombre as nombreIdioma, n.numNivel, m.nombre, m.turno FROM grupos as g inner join nivels as n on g.idnivels = n.id inner join categorias as c on c.id = n.idcategorias inner join idiomas as i on i.id = n.ididiomas INNER join modalidads as m on m.id = n.idmodalidads where g.id = ". intval(@$query) ));
    $grupo = @$grupo[0];      
    $nvMaterial = ceil(intval( $grupo->numNivel ) / 4);
    if ($grupo) {
      $grupo->prestamo = DB::select(
        DB::raw("select dmd.id as keyPrimary, md.codigo, md.titulo, nv.numNivel, ct.nombre, id.nombre as idioma, md.id from docente_material_didacticos as dmd inner join material_didacticos as md on md.id = dmd.material_didactico_id inner join idiomas as id on id.id = md.idioma_id inner join categorias as ct on ct.id = md.categoria_id INNER join nivels as nv on nv.id = md.nivel_id where dmd.estado = 1 and dmd.grupo_id = ". intval($query))
      );
      
      if(count($grupo->prestamo) === 0){
        $grupo->books = MaterialDidactico::where('nivel_id', $nvMaterial)
          ->where('idioma_id', $grupo->idiomaId)
          ->where('estado', 1)
          ->get();
      }
    }
  }
  return view('docentes.materiales', compact('docente', 'grupos', 'grupo'));
  }

  public function addMaterialDocente(Request $request)
  {
  $params = $request->all();
  $m = new DocenteMaterialDidactico;
  $m->grupo_id = $params['grupo_id'];
  $m->docente_id = $params['docente_id'];
  $m->material_didactico_id = $params['material_didactico_id'];

  if($m->save()) {
    MaterialDidactico::where('id', $params['material_didactico_id'])
      ->update([ 'estado' =>  2 ]);

    return response()->json([
      'origin'  => $m,
      'message' => 'Hemos agregado con exito el material al docente'
    ], 200);
  }

  return response()->json([
    'message' => 'Tenemos un problema con la base de datos intenta mas tarde'
  ], 500);
  }

  public function sendMaterialDidactico(Request $request)
  {
  $params = $request->all();
  $md = DocenteMaterialDidactico::where('id', $params['id'])
    ->update([
      'estado' => 0
    ]);

  $m = MaterialDidactico::where('id', $params['material'])
      ->update([
        "estado"  => 1
      ]);

  return response()->json([
    'origin'  => $m,
    'message' => 'Se ha entregado con exito el material'
  ], 200);
  }
//----------------------------------FIN CODIGO MELARA-----------------------------------------------//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
