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
    		]);	 
    	return Response::json($message);
 
	return redirect('/home')->with('mensaje','Registro Guardado');	
    	
    	
    }
    public function update(Request $request,$id){
        //dd($request->all());
        $message = noticia::find($id);
         $message->fill($request->all());
        $message->save();
        return Response::json($message);
        //return response(json($array));
    }

}
