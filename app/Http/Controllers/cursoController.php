<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\responsable;

use App\estudiante;
use App\idioma;
use App\modalidad;
use App\categoria;
use App\horariocurso;
use App\dia;
use App\curso;

use App\cursocategoria;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;


class cursoController extends Controller
{
    //
       //
	public static function verCategorias($idcurso){
		 
         $categorias=DB::table('cursocategorias')
         ->join('categorias', 'cursocategorias.idcategorias', '=', 'categorias.id')
         ->select('categorias.*','cursocategorias.cuota')
         ->where('cursocategorias.idcursos',$idcurso)
         ->where('cursocategorias.estado','ACTIVO')->get();
		//$categorias=cursocategoria::where('idcursos',$idcurso)
    	//->where('estado','ACTIVO')->get();//->orderBy('id', 'desc');
    	
    		return $categorias;
    }
    public function show(){
    	/* $categorias=DB::table('cursocategorias')
         ->join('categorias', 'cursocategorias.idcategorias', '=', 'categorias.id')
         ->select('categorias.*')
         ->where('cursocategorias.idcursos',9)
         ->where('cursocategorias.estado','ACTIVO')->get();
		return Response::json($categorias);
*/
    	$curso=curso::latest()->get(); 

        	  return view('curso.showCurso',[
            	 'cursos' => $curso,                 
            	]);
      }

    public function create(Request $request){
    	$l=0;
    	//return Response::json($request);
    	//creacion de array para dias
    	 $dias = array('1' =>'Lunes' ,
            '2' =>'Martes' ,
            '3' =>'Miercoles' ,
            '4' =>'Jueves' ,
            '5' =>'Vernes' ,
            '6' =>'Sabado' ,
            '7' =>'Domingo' ,
         );
         $diasContractado = array('1' =>'L' ,
            '2' =>'M' ,
            '3' =>'X' ,
            '4' =>'J' ,
            '5' =>'V' ,
            '6' =>'S' ,
            '7' =>'D' ,
         );
         if(dia::count()>0){//Si existen dias registrados no hacer nada       
         }else{
         	for ($i=1 ;$i <=7 ; $i++) { //crear los registros de dias de semana en tabla dia
         	$message=dia::create([
	    		'numDia'=> $i,
	    		'nombreDia'=>$dias[$i],
	    		'contractado'=> $diasContractado[$i],
	    		]);	
     		}

         }
        //------------------------------------> si es modulo o sub
	         if($request->input('cont2')>0){
	         	$modulos='10 MODULOS';
	    
	         }
	         else{
	         	$modulos='5 MODULOS';
	    
	         }
        //------------------------------------// modulos
         
        //------------------------------------> crear el registro en tabla curso    
         		$message= curso::create([
	    		'modulos'=> $modulos,
	    		'estado'=>'ACTIVO',
	    		'ididiomas'=> $request->input('idioma_id'),
	    		'idmodalidads'=> $request->input('moda_id'),
	    		]);	
 		//------------------------------------// din ingreso tabla curso
        
        //--------------------------------> crear registros de tabla horarios cursos 
        
       	    $curso=curso::where('ididiomas',$request->input('idioma_id'))
    		->where('idmodalidads',$request->input('moda_id'))->orderBy('id', 'desc')->first();
    		//return Response::json($curso->id);
    	
    		if($request->input('cont2')==null){///------------->si solo existe un dia 
    			//ingrese la tabla relacion
    			$message= horariocurso::create([
	    		'horaInicio'=> $request->input('horaInicio'),
	    		'horaFin'=> $request->input('horaFin'),
	    		'idcursos'=> $curso->id,
	    		'iddias'=> $request->input('dias'),
	    		
	    		]);	
    		}else{///------------------>si son varios dias los que se registran 
    			//ingrese tabla relacion con un for del tamanho del cont2
    			// se ingresan los dias en que el curso de un idioma y una modalidad especifica estan
    			$message= horariocurso::create([
	    		'horaInicio'=> $request->input('horaInicio'),
	    		'horaFin'=> $request->input('horaFin'),
	    		'idcursos'=> $curso->id,
	    		'iddias'=> $request->input('dias'),
	    		
	    		]);	
    			for($i=1;$i<=$request->input('cont2');$i++){
			    		if(!empty($request->input('dias'.$i))){// != null){
			    			$message= horariocurso::create([
					    		'horaInicio'=> $request->input('horaInicio'.$i),
					    		'horaFin'=> $request->input('horaFin'.$i),
					    		'idcursos'=> $curso->id,
					    		'iddias'=> $request->input('dias'.$i),
					    		]);	
			    		}

			    }

    		}

    	//------------------------------------// fin ingreso tabla horarioscursos
       
        //--------------------------------> crear registros de tabla cursocategorias

	    	   if($request->input('cont')==null){///------------->si solo existe una categoria
	    			//ingrese la tabla relacion
	    			$message= cursocategoria::create([
		    		'cuota'=> $request->input('nombre'),//id nombre es cuota en vista
		    		'estado'=>'ACTIVO',
		    		'idcategorias'=> $request->input('cat_id'),
		    		'idcursos'=> $curso->id,
		    		]);	
	    		}else{

	    			$message= cursocategoria::create([
		    		'cuota'=> $request->input('nombre'),
		    		'estado'=>'ACTIVO',
		    		'idcategorias'=> $request->input('cat_id'),
		    		'idcursos'=> $curso->id,
		    		]);

		    		for($i=1;$i<=$request->input('cont');$i++){

			    		if(!empty($request->input('cat_id'.$i))){// != null){
			    			$message= cursocategoria::create([
				    		'cuota'=> $request->input('nombre'.$i),
				    		'estado'=>'ACTIVO',
				    		'idcategorias'=> $request->input('cat_id'.$i),
				    		'idcursos'=> $curso->id,
				    		]);
				    		
			    		}

			    	}

	    		}
	    		
 		//------------------------------------// fin ingreso tabla horarioscursos
       

           return Response::json([
            'bandera' =>1,
            'response'=>'Registro Guardado Exitosamente',                 
   			 ]);
        
    }
   /* public function create(Request $request){
    	$l=0;
    	//return Response::json($request);
    	//creacion de array para dias
    	 $dias = array('1' =>'Lunes' ,
            '2' =>'Martes' ,
            '3' =>'Miercoles' ,
            '4' =>'Jueves' ,
            '5' =>'Vernes' ,
            '6' =>'Sabado' ,
            '7' =>'Domingo' ,
         );
         $diasContractado = array('1' =>'L' ,
            '2' =>'M' ,
            '3' =>'X' ,
            '4' =>'J' ,
            '5' =>'V' ,
            '6' =>'S' ,
            '7' =>'D' ,
         );
         if(dia::count()>0){//Si existen dias registrados no hacer nada       
         }else{
         	for ($i=1 ;$i <=7 ; $i++) { //crear los registros de dias de semana en tabla dia
         	$message=dia::create([
	    		'numDia'=> $i,
	    		'nombreDia'=>$dias[$i],
	    		'contractado'=> $diasContractado[$i],
	    		]);	
     		}

         }
         
        // return Response::json(curso::get()->last());
         if($request->input('cont2')>0){
         	$modulos='10 MODULOS';
    
         }
         else{
         	$modulos='5 MODULOS';
    
         }
    	if($request->input('cont')==null){
    		
    		$message= curso::create([
	    		'modulos'=> $modulos,
	    		'estado'=>'ACTIVO',
	    		'ididiomas'=> $request->input('idioma_id'),
	    		'idcategorias'=> $request->input('cat_id'),
	    		'idmodalidads'=> $request->input('moda_id'),
	    		]);	
    		$curso=curso::where('idcategorias',$request->input('cat_id'))
    		->where('idmodalidads',$request->input('moda_id'))->orderBy('id', 'desc')->first();
    		//return Response::json($curso->id);
    		if($request->input('cont2')==null){
    			//ingrese la tabla relacion
    			$message= horariocurso::create([
	    		'horaInicio'=> $request->input('horaInicio'),
	    		'horaFin'=> $request->input('horaFin'),
	    		'idcursos'=> $curso->id,
	    		'iddias'=> $request->input('dias'),
	    		
	    		]);	
    		}else{
    			//ingrese tabla relacion con un for del tamanho del cont2
    			// se ingresan los dias en que el curso de un idioma y una modalidad especifica estan
    			for($i=1;$i<=$request->input('cont2');$i++){
			    		if(!empty($request->input('dias'.$i))){// != null){
			    			$message= horariocurso::create([
					    		'horaInicio'=> $request->input('horaInicio'.$i),
					    		'horaFin'=> $request->input('horaFin'.$i),
					    		'idcursos'=> $curso->id,
					    		'iddias'=> $request->input('dias'),
					    		]);	
			    		}

			    }

    		}
    		return Response::json([
            'bandera' =>1,
            'response'=>'Registro Guardado Exitosamente',                 
   			 ]);

    	}else{
    		$message= curso::create([
	    		'modulos'=> $modulos,
	    		'estado'=>'ACTIVO',
	    		'ididiomas'=> $request->input('idioma_id'),
	    		'idcategorias'=> $request->input('cat_id'),
	    		'idmodalidads'=> $request->input('moda_id'),
	    		]);	
    		$curso=curso::where('idcategorias',$request->input('cat_id'))
    		->where('idmodalidads',$request->input('moda_id'))->orderBy('id', 'desc')->first();
    		//return Response::json($curso->id);
    		if($request->input('cont2')==null){
    			//ingrese la tabla relacion
    			$message= horariocurso::create([
	    		'horaInicio'=> $request->input('horaInicio'),
	    		'horaFin'=> $request->input('horaFin'),
	    		'idcursos'=> $curso->id,
	    		'iddias'=> $request->input('dias'),
	    		
	    		]);	
    		}else{
    			//ingrese tabla relacion con un for del tamanho del cont2
    			// se ingresan los dias en que el curso de un idioma y una modalidad especifica estan
    			for($i=1;$i<=$request->input('cont2');$i++){
			    		if(!empty($request->input('dias'.$i))){// != null){
			    			$message= horariocurso::create([
					    		'horaInicio'=> $request->input('horaInicio'.$i),
					    		'horaFin'=> $request->input('horaFin'.$i),
					    		'idcursos'=> $curso->id,
					    		'iddias'=> $request->input('dias'),
					    		]);	
			    		}

			    }

    		}
			for($i=1;$i<=$request->input('cont');$i++){

			    	//	if($request->input('cat_id'.$i) != undefined){
			    		if(!empty($request->input('cat_id'.$i))){// != null){
			    				//			 return Response::json('ntroe');
         
			    			//$i--;
			    			$message= curso::create([
					    		'modulos'=> $modulos,
					    		'estado'=>'ACTIVO',
					    		'ididiomas'=> $request->input('idioma_id'),
					    		'idcategorias'=> $request->input('cat_id'.$i),
					    		'idmodalidads'=> $request->input('moda_id'),
					    		]);	


			    				$curso=curso::where('idcategorias',$request->input('cat_id'.$i))
					    		->where('idmodalidads',$request->input('moda_id'))->orderBy('id', 'desc')->first();
					    		//return Response::json($curso->id);
					    		if($request->input('cont2')==null){
					    			//ingrese la tabla relacion
					    			$message= horariocurso::create([
						    		'horaInicio'=> $request->input('horaInicio'),
						    		'horaFin'=> $request->input('horaFin'),
						    		'idcursos'=> $curso->id,
						    		'iddias'=> $request->input('dias'),
						    		
						    		]);	
					    		}else{
					    			//ingrese tabla relacion con un for del tamanho del cont2
					    			// se ingresan los dias en que el curso de un idioma y una modalidad especifica estan
					    			for($j=1;$j<=$request->input('cont2');$j++){
								    		if(!empty($request->input('dias'.$j))){// != null){
								    			$message= horariocurso::create([
										    		'horaInicio'=> $request->input('horaInicio'.$j),
										    		'horaFin'=> $request->input('horaFin'.$j),
										    		'idcursos'=> $curso->id,
										    		'iddias'=> $request->input('dias'),
										    		]);	
								    		}

								    }

					    		}
			    		}

			    }//fin for for($i=1;$i<=$request->input('cont');$i++)
			    return Response::json([
            'bandera' =>1,
            'response'=>'Registro Guardado Exitosamente',                 
   			 ]);

    	}
    	
    	return Response::json($l);
        $message=idioma::get(); 
        return Response::json($message);
    }*/
    public function busquedaSelectIdioma(){
         $message=idioma::get(); 
        return Response::json($message);
    }
	public function busquedaSelectModalidad(){
        $message=modalidad::get(); 
        return Response::json($message);
    }
    public function busquedaSelectCategoria(){
        $message=categoria::get(); 
        return Response::json($message);
    }

}
