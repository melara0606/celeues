<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\periodo;
use App\curso;
use App\horariocurso;
use App\cursocategoria;
use App\modalidad;
use App\categoria;
use App\nivel;
use App\grupo;


use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;

class grupoController extends Controller
{
    //
    public function show(){

    	$curso=DB::table('cursos')
         ->join('idiomas', 'cursos.ididiomas', '=', 'idiomas.id')
         ->join('modalidads', 'cursos.idmodalidads', '=', 'modalidads.id')
         ->select('cursos.*',
         	'modalidads.nombre as nombreModalidad',
         	'modalidads.turno',
         	'idiomas.nombre as nombreIdioma')

         //->where("cursos.ididiomas",$ididiomas->id)
         ->where("cursos.estado","ACTIVO")
         ->get();

         $categorias=categoria::get();


    	  $year=date("Y");
//return Response::json($categorias);
     	$periodos=periodo::where('año',$year)->where('nombre','10')->get();
          $años=periodo::distinct()->get(['año']);

    	return view('grupos.showGrupos',[
    			 'periodos' => $periodos,
               	 'anhos' => $años,
				 'cursos' => $curso, 
            	 
            	 //'cursos' => 1, 
            	 'numCategorias'=> 1,  
            	 'categorias'=> $categorias,             
            	]);
    }

    public function create(Request $request){
    	$cupos=$request->input('cupos');
    	$numGrupo=$request->input('numGrupos');
    	$nivel=$request->input('nivel');
    	$idcursocategorias=$request->input('idcursocategorias');
    	$idcursos=$request->input('idcursos');
 

    	$cursos=curso::find($idcursos);
    	
    	if($cursos->modulos=="5 MODULOS"){
    		$modulos="5";
    	}else{
    		$modulos="10";

    	}
    	$periodo=periodo::where('nombre',$modulos)->where('estado','ACTIVO')->get()->first();
//return Response::json($periodo);
   
    	for ($i=0; $i <$numGrupo ; $i++) { 
    		//return Response::json('entro');
  
    		 $message= grupo::create([
		      //'numperiodo'=> $i,
		      'cupos'=> $cupos,
		      'numGrupo'=> $numGrupo,
		      'idnivels'=>$nivel,
		     'idperiodos'=>$periodo->id,
		      'estado'=> "INICIADO",
		      ]);
	    		
    	}

    	return Response::json([
		    'bandera'=>1,
		    'response'=>'Registro Guardado extisamente',
		 ]);

    	


    }//fin create


    public function buscarCategorias($idcursos){
    	//$message = periodo::find($id);
    	$categorias=DB::table('cursocategorias')
         ->join('categorias', 'cursocategorias.idcategorias', '=', 'categorias.id')
         ->select('categorias.*','cursocategorias.id as idcursocategorias')

         //->where("cursos.ididiomas",$ididiomas->id)
         ->where("cursocategorias.idcursos",$idcursos)
         ->get();
         return Response::json($categorias);

    }//fin buscarCategorias

     public function buscarNiveles($idcursocategorias){
    	$message = nivel::where('idcursocategorias',$idcursocategorias)->get();
    	
         return Response::json($message);

    }//fin buscarNiveles

}
