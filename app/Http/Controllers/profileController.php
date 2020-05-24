<?php

namespace App\Http\Controllers;
use App\estudiante;
use App\responsable;

use App\docente;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use DateTime;
class profileController extends Controller
{
    //
    public function showProfile(){
        $usuarioActual=\Auth::user();
       // return Response::json($usuarioActual);
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
    
}
