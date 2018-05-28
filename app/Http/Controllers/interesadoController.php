<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interesado;
//use App\noticiaInteresado;
use Illuminate\Support\Facades\Response;


class interesadoController extends Controller
{
    //
     public function show($id){   
        
        $interesados=interesado::latest()->get();  
          return view('interesados.showInteresado',[
             'interesados' => $interesados,      
           
        //'noticias'=> $noticias,
            ]);
}
     public function showForm($id){   
    	
        //$interesados=interesado::latest()->paginate(8);  
    	  return view('interesados.formInteresados',[
             'idNoticia' => $id,      
           
        //'noticias'=> $noticias,
            ]);
    }

       public function create(Request $request){//createBeneficiariosRequest $request){  
       $message= interesado::create([
            'nombre'=> $request->input('nombre'),
            'apellido'=> $request->input('apellido'),
            'fechaNac'=> $request->input('fechaNac'),
            'telefono'=> $request->input('telefono'),
            'email'=> $request->input('email'),
            'idnoticias'=> $request->input('idnoticias'),
           
           // 'modalidad'=> $request->input('modalidad'),
           // 'estado'=> 'Disponible',
            ]);

          
        return Response::json($message);
 
    return redirect('/home')->with('mensaje','Registro Guardado');  
        
        
    }
 
    
}
