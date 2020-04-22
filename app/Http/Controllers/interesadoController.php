<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interesado;
use App\noticia;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\DB;


class interesadoController extends Controller
{
    //
     public function show($id){   
        $noticia=noticia::find($id)->first();
        $interesados=interesado::latest()->get();  
          return view('interesados.showInteresado',[
            'noticia'=>$noticia,
             'interesados' => $interesados,      
           
        //'noticias'=> $noticias,
            ]);
}
     public function showform($id){   
    	
        //$interesados=interesado::latest()->paginate(8); 
        $noticia=noticia::find($id)->first(); 
    	  return view('interesados.ingresoInteresado',[
             'noticia'=>$noticia,
             'idNoticia' => $id,      
           
        //'noticias'=> $noticias,
            ]);
    }

       public function create(Request $request){//createBeneficiariosRequest $request){  
       
       $countemail=count(interesado::where('email',$request->input('email'))
        ->where('idnoticias',$request->input('idnoticias'))->get());
       if($countemail>0){
            return Response::json('Ya esciste unn registro de esta noticia con ese email');
       }
        //----------// TRNSACCION //----------/
       DB::beginTransaction();
       try{ 
           $message= interesado::create([
                'nombre'=> $request->input('nombre'),
                'apellido'=> $request->input('apellido'),
                'fechaNac'=> $request->input('fechaNac'),
                'telefono'=> $request->input('telefono'),
                'email'=> $request->input('email'),
                'idnoticias'=> $request->input('idnoticias'),
                'estado'=>'INTERESADO',
               
               // 'modalidad'=> $request->input('modalidad'),
               // 'estado'=> 'Disponible',
                ]);
              // $count=count(interesado::where('estado','REGISTRADO')->get()); 
               $count2=count(interesado::where('estado','INTERESADO')->get()); 
               
               $noticia=noticia::find($request->input('idnoticias'));
               $noticia->fill([
                // 'numRegistrados'=> $count,
                 'numInteresados'=> $count2,
                 
               ]);
             if($noticia->save()){
                 DB::commit();
             }else{
                DB::rollback();
             }
      
             return Response::json($message);

 
            return redirect('/home')->with('mensaje','Registro Guardado');  
         } catch (\Throwable $e) {
                  DB::rollback();
                  return Response::json('error en registrar a la BD '+$e); 
                 
         }////fin catch
        
    }
    public function buscar($id){
        $interesado=interesado::find($id);//->first();
        return Response::json($interesado);
    }
 
    
}
