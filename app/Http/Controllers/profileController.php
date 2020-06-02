<?php

namespace App\Http\Controllers;
use App\estudiante;
use App\responsable;

use App\docente;
use App\user;

use App\idioma;
use App\estudiantegrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
class profileController extends Controller
{
    //
    public function showProfile(){
        ///////guardar 7 dias despues/////////
        $date = new DateTime('now');
        $date->add(new DateInterval('P7D'));

        $usuarioActual=\Auth::user();
        //return Response::json($date);
        if($usuarioActual->tipo=="ESTUDIANTE"){
            $estudent=estudiante::where('idusers',$usuarioActual->id)->get()->first();
            //return Response::json($estudent);
            $estudiante=estudiante::find($estudent->id);
            return view('profile.showperfilEstudiante',[
                'estudiante' => $estudiante,      
            ]);
        }
        if($usuarioActual->tipo=="DOCENTE"){
            $estudent=docente::where('idusers',$usuarioActual->id)->get()->first();
            //return Response::json($estudent);
            $docente=docente::find($estudent->id);
            return view('profile.showperfilDocente',[
                'docente' => $docente,      
            ]);
        }
      
    }
    public function showCambiarPassword(){
        $usuarioActual=\Auth::user();
        return view('profile.cambiarPassword');
  
    }
    public function updatePassword(Request $request){
        $usuarioActual=\Auth::user();
       //return Response::json($usuarioActual);
        $attributes = [
            'contrasenha' => 'Contraseña',
            'repetirContrasenha' => 'Comprobar Contraseña',
            
          ];
          $validator = \Validator::make($request->all(), [
            'contrasenha' => 'required|min:6',
            'repetirContrasenha' => 'required|same:contrasenha',
          ], [
          ]
          , $attributes);
        if ($validator->fails())
        {
          return response()->json([
           'bandera' =>3,
           'errors'=>$validator->errors()->all(),
         ]);
        }
        $message=user::find($usuarioActual->id);
        $message->fill([
             'password'=> bcrypt($request->input('contrasenha')),
          ]);
        if($message->save()){
            return Response::json([
                'bandera' =>1,
                'response'=>'Usuario Creado y correo enviado Exitosamente',                 
            ]);
        }else{
            return Response::json([
                'bandera' =>0,
                'response'=>'Ocurrio un error al guardar',                 
            ]);
        }

    }

    public function gruposcursadosEstudiante(){
        $usuarioActual=\Auth::user();
        $estudent=estudiante::where('idusers',$usuarioActual->id)->get()->first();
        //return Response::json($estudent);
        $estudiante=estudiante::find($estudent->id);
        $estudiantegrupos=estudiantegrupo::where('estudiantegrupos.idestudiantes',$estudiante->id)
        ->leftJoin('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
        ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
        ->select('estudiantegrupos.*')
        ->orderBy('nivels.numNivel','ASC')
        ->orderBy('grupos.numGrupo','ASC')
        ->with('ponderacions')
        ->get();
      // $estudiantegrupos=estudiantegrupo::find(49);
       // return Response::json($estudiantegrupos);
        $idiomas=idioma::where('estado','ACTIVO')->get();
        if(count($estudiantegrupos)>0){
            $ididioma=$estudiantegrupos->first()->grupos->nivels->ididiomas;
        }else{
        $ididioma=1;
        }
        return view('profile.gruposcursadosEstudiante',[
            'estudiantegrupos' => $estudiantegrupos, 
            'estudiante'=>$estudiante,
            'idiomas' => $idiomas, 
            'ididioma'=> $ididioma,
                //'noticias'=> $noticias,
          ]); 
    }

    public function gruposcursadosEstudianteParametro($ididioma){
        $usuarioActual=\Auth::user();
        $estudent=estudiante::where('idusers',$usuarioActual->id)->get()->first();
        //return Response::json($estudent);
        $estudiante=estudiante::find($estudent->id);
        $estudiantegrupos=estudiantegrupo::Where('estudiantegrupos.idestudiantes',$estudiante->id)
        ->leftJoin('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
        ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
        ->select('estudiantegrupos.*')
        ->where('nivels.ididiomas',$ididioma)
        ->orderBy('nivels.numNivel','ASC')
        ->orderBy('grupos.numGrupo','ASC')
        ->with('ponderacions')
        ->get();
        $idiomas=idioma::where('estado','ACTIVO')->get();
    
        return view('profile.gruposcursadosEstudiante',[
          'estudiantegrupos' => $estudiantegrupos, 
          'estudiante'=>$estudiante,
          'idiomas' => $idiomas, 
          'ididioma'=> $ididioma,
              //'noticias'=> $noticias,
        ]);
      }
    
}
