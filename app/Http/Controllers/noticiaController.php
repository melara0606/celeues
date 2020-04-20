<?php

namespace App\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\noticia;
use Illuminate\Support\Facades\Response;
class noticiaController extends Controller
{
    //
    public function show(){   
    	$noticias=noticia::latest()->get(); 
    	  return view('noticias.showNoticia',[
    	'noticias'=> $noticias,
        'algo'=>1,
    		]);
    }
      public function showForm(){   
    	//$noticias=noticia::latest()->paginate(8);  
    	  return view('noticias.formNoticia',[
        'estado' => 1,
    	//'noticias'=> $noticias,
    		]);
    }
    public function showFormUpdate($id){   
         $message = noticia::find($id);
          return view('noticias.formNoticia',[
             'estado' => 2,      
            'datos'=> $message,
        //'noticias'=> $noticias,
            ]);
    }
    public function create(Request $request){//createBeneficiariosRequest $request){
    	//$message= beneficiario::create($request->all());
		//$response = socio::create($request->all());



   	$message= noticia::create([
    		'titulo'=> $request->input('titulo'),
    		'descripcion'=> $request->input('descripcion'),
    		'numModulo'=> $request->input('numModulo'),
    		'fechaInicio'=> $request->input('fechaInicio'),
    		'fechaFin'=> $request->input('fechaFin'),
    		'modalidad'=> $request->input('modalidad'),
    		'estado'=> 'Disponible',
            'numInteresados'=>0,
            'numRegistrados'=>0,
    		]);	 
    return Response::json('Registro Guardado Exitosamente');
 
    	return Response::json($message);
 
	return redirect('/home')->with('mensaje','Registro Guardado');	
    	
    	
    }
    public function update(Request $request,$id){
        //dd($request->all());
        $message = noticia::find($id);
         $message->fill($request->all());
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Registro Modificado Exitosamente');
            }else
                return Response::json('No pudo Modificarse');

    }
     public function buscar($id){
        $noticia = noticia::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));    
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);  
    return Response::json($noticia);
    }

}
