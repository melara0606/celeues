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
use App\idioma;
use App\aula;
use App\docente;



use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;

class grupoController extends Controller
{
    //
    public function showEditable(){
        return view('grupos.exampleEditable',[
                 'selectPeriodo'=>1,/////parametros          
                ]);
    }

    public static function verIdioma($ididiomas){
    	$message=idioma::find($ididiomas);
    	return $message->nombre;

    }
    public static function verCategoria($idcategorias){
    	$message=categoria::find($idcategorias);
    	return $message->nombre;

    }
    public static function verAula($idaulas){
    	if ($idaulas==null) {
    		return 'N/A';
    	}

    	$message=aula::find($idaulas);
    	return ''.$message->nombre;
    }
    public static function verDocente($iddocentes){
    	if ($iddocentes==null) {
    		return 'N/A';
    	}

    	$message=docente::find($iddocentes);
    	return ''.$message->nombre.' '.$message->apellido;
    }
    

    public static function numeroCategorias($idperiodos,$idcursocategorias){
        $grupos=DB::table('grupos')
          ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
          ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
          ->select('grupos.*','nivels.*','grupos.id as idgrupos')
          //->where('periodos.anho',$year)
          ->where('periodos.id',$idperiodos)
          //->where('nivels.idcursos',$idcurso)//no se si son necesaios
          //->where('periodos.nombre',$modulos)//no se si son necesaios
          ->where('nivels.idcursocategorias',$idcursocategorias)/////parametros
          ->orderBy('nivels.numNivel')
          ->orderBy('grupos.numGrupo')
          
          ->get();
          $count=count($grupos);

        //return Response::json($count);          
          return $count;

    }////Aca terminan los static function

    public function buscarGrupos($idgrupos){
        $message=grupo::find($idgrupos);
        $grupos=DB::table('grupos')
          ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
          ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
          ->select('grupos.*','nivels.numNivel')
          ->where('grupos.id',$idgrupos)/////parametros
          ->get()->first();
         //return Response::json($grupos); 
        $aula=grupoController::verAula($grupos->idaulas);
        $docente=grupoController::verDocente($grupos->iddocentes);
        $seccion = array('1' =>'A' ,
                            '2' =>'B' ,
                            '3' =>'C' ,
                            '4' =>'D' ,
                            '5' =>'E' ,
                            '6' =>'F' ,
                            
                         );
         return Response::json([
                'grupo'=>$grupos,
                'aula'=>$aula,
                'docente'=>$docente,
                'seccion'=>$seccion[$grupos->numGrupo],
                ]);
        /*$cursocategorias=DB::table('cursocategorias')
         ->join('categorias', 'cursocategorias.idcategorias', '=', 'categorias.id')
         ->select('categorias.nombre',
            'cursocategorias.id as idcursocategorias',
            'categorias.id as idcategorias',
            'categorias.edadInicio',
            'categorias.edadFin')
         ->where("cursocategorias.idcursos",$curso->first()->id)
         ->where("cursocategorias.estado","ACTIVO")
         ->get();*/

    }
    
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
         $cursocategorias=DB::table('cursocategorias')
         ->join('categorias', 'cursocategorias.idcategorias', '=', 'categorias.id')
         ->select('categorias.nombre',

            'cursocategorias.id as idcursocategorias',
            
         	'categorias.id as idcategorias',
         	'categorias.edadInicio',
         	'categorias.edadFin')
         ->where("cursocategorias.idcursos",$curso->first()->id)
		 ->where("cursocategorias.estado","ACTIVO")
         ->get();

         //$categorias=categoria::get();
         //$primerCategoria=categoria::get()->first();

    	$year=date("Y");
		//return Response::json($cursocategorias->first()->idcategorias);
     	//$periodos=periodo::where('año',$year)->where('nombre','10')->get();
         $anhos=periodo::distinct()->get(['anho']);
          if($curso->first()->modulos=="5 MODULOS"){
                $modulos='5';
             }else{
                 $modulos='10';
             }
        $periodos=periodo::where('nombre',$modulos)->where('anho',$year)->get();
        $periodoActual=periodo::where('nombre',$modulos)->where('estado','ACTIVO')->where('anho',$year)->get()->first();
        
          $grupos=DB::table('grupos')
          ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
		  //->join('aulas', 'grupos.idaulas', '=', 'aulas.id')
		  ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
		  //->join('docentes', 'grupos.iddocentes', '=', 'docentes.id')
		  ->select('grupos.*','nivels.*','grupos.id as idgrupos','grupos.estado as estadoGrupo')
         // ->where('periodos.anho',$year)
		 // ->where('periodos.estado','ACTIVO')
		  ->where('periodos.id',$periodoActual->id)////////////////////////nno se si sive o no
		  ->where('nivels.idcursocategorias',$cursocategorias->first()->idcursocategorias)/////parametros
		  //->paginate(1);
          ->orderBy('nivels.numNivel')
           ->orderBy('grupos.numGrupo')
          ->get();
		  //return Response::json($grupos);

        //return Response::json($periodo);

    	   return view('grupos.showGrupos',[
    			 //'periodos' => $periodos,
               	 'anhos' => $anhos,
				 'cursos' => $curso, 
				 'cursoNombreDiv'=>$curso->first()->nombreIdioma.' '.$curso->first()->nombreModalidad.' '.$curso->first()->turno,
            	 'grupos'=>$grupos,           
            	 'selectCategoria'=> $cursocategorias->first()->idcategorias,/////parametros
            	 'selectCurso'=> $curso->first()->id,  /////parametros
            	 'categorias'=> $cursocategorias,   
            	 'selectYear'=>$year,/////parametros
                 'selectModulo'=>$curso->first()->modulos,/////parametros  
                 'selectPeriodo'=>$periodoActual->id,/////parametros  
                 'periodos'=>$periodos,        
            	]);

    }//fin show

       public function filtrar(Request $request){
            $idcurso=$request->input('cursofiltro');
            $year=$request->input('anhofiltro');
            $idcursocategorias=$request->input('categoriafiltro');

//return Response::json($request->input('periodofiltro'));
            $curso=curso::find($idcurso);////////////////todo lo que tiene que ver con curso en este metodo esta demas
              $cursocategorias=DB::table('cursocategorias')
             ->join('categorias', 'cursocategorias.idcategorias', '=', 'categorias.id')
             ->select('categorias.nombre',
                 'cursocategorias.id as idcursocategorias',
                'categorias.id as idcategorias',
                'categorias.edadInicio',
                'categorias.edadFin')
             ->where("cursocategorias.idcursos",$idcurso)
             ->where("cursocategorias.estado","ACTIVO")
             ->get();
//return Response::json($cursocategorias);
             if($curso->modulos=="5 MODULOS"){
                $modulos='5';
             }else{
                 $modulos='10';
             }

             if ($request->input('value') ==0) {
                 $idCategoriaActual=$idcursocategorias;
             }else{
                $idCategoriaActual=$request->input('value');
             }

             $grupos=DB::table('grupos')
          ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
          ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
          ->select('grupos.*','nivels.*','grupos.id as idgrupos','grupos.estado as estadoGrupo')
          //->where('periodos.anho',$year)
          ->where('periodos.id',$request->input('periodofiltro'))
          //->where('nivels.idcursos',$idcurso)//no se si son necesaios
          //->where('periodos.nombre',$modulos)//no se si son necesaios
          ->where('nivels.idcursocategorias',$idCategoriaActual)/////parametros
          ->orderBy('nivels.numNivel')
          ->orderBy('grupos.numGrupo')
          
          ->get();

//return Response::json($grupos);
          $seccion = array('1' =>'A' ,
                            '2' =>'B' ,
                            '3' =>'C' ,
                            '4' =>'D' ,
                            '5' =>'E' ,
                            '6' =>'F' ,
                            
                         );

          if($grupos){
            $outputGrupos="";
            $outputCategorias="";
            foreach ($grupos as $key => $grupo) {
                
                
            $outputGrupos.='<div class="col-md-6 single-item">'.
                '<div class="col-sm-12 col-md-12">'.
                    
                     '<div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px #bbbbbb !important; border-radius: 5px;">'.

                        '<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">'.
                            '<div class="comments media-block">'.
                                    '<div class="media-body">'.
                                        '<div class="comment-header">'.
                                            '<a href="#" class="media-heading box-inline text-main text-semibold ">'.ucwords(strtolower(grupoController::verIdioma($grupo->ididiomas))).' Nivel '.$grupo->numNivel.' '.$seccion[$grupo->numGrupo].'</a> <a href="#" class="media-heading box-inline text-main text-semibold media-right text-sm">'.ucwords(strtolower(grupoController::verAula($grupo->idaulas))).'</a>'.
                                            '<p class="text-muted text-sm "><!--<i class="demo-pli-smartphone-3 icon-lg">--></i>'.ucwords(strtolower(grupoController::verCategoria($grupo->idcategorias))).' | Teacher Lic. </p>'.

                                        '</div>'.
                                        '<p class=" media-left text-sm">30 estudiantes ----- '.$grupo->cupos.' disponibles </p>'.
                                        

                                    '</div>'.
                            '</div>'.
                                '<div class="text-right">'.
                                    '<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Información" data-container="body" value="'.$grupo->idgrupos.'"><i class="demo-pli-exclamation icon-lg " ></i> </button>'.
                               
                                      '<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Asignar aula y maestro" data-container="body" value="'.$grupo->idgrupos.'"><i class="demo-pli-add icon-lg " ></i> </button>'.
                                     '<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Modificar Grupo" data-container="body" value="'.$grupo->idgrupos.'"><i class="demo-psi-pen-5 icon-md " ></i> </button>'.
                                     '<button class="btn btn-icon btn-trans btn-xs media-right btn-hover infoModal add-tooltip actualPrecio" data-original-title="Eliminar grupo" data-container="body" value="'.$grupo->idgrupos.'"><i class="demo-pli-remove icon-md " ></i> </button>'.
                                 '</div>'.
                               
                            
                        '</div>'.
                        
                     '</div>'.
                    
                '</div>'.
                
            '</div>';
            
               /*$output.='<tr>'.
                        '<td>'.$message->apodo.'</td>'.
                        '<td>'.$message->nombre.
                        ' '.$message->apellido.'</td>'.
                        '<td>'.$message->email.'</td>'.
                        '<td style="font-size:14px" class="text-center">'.sociosPagoController::verDeuda($message->id).'</td>';
                $output.=$sAc;*/     

             }
             foreach ($cursocategorias as $key => $cursocategoria) {
                if ($request->input('value')==0) {
                    if($idcursocategorias==$cursocategoria->idcursocategorias){
                        $outputCategorias.='<td>'.
                            '<button type="button" class="btn btn-mint active filtrar"'.
                            'value="'.$cursocategoria->idcursocategorias.'">'.$cursocategoria->nombre.' '.$cursocategoria->edadInicio.' - '.$cursocategoria->edadFin.' <span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted">'.grupoController::numeroCategorias($request->input('periodofiltro'),$cursocategoria->idcursocategorias).'</span></button>'.
                         '</td>';
                     }else{
                        $outputCategorias.='<td>'.
                            '<button type="button" class="btn btn-mint filtrar"'.
                            'value="'.$cursocategoria->idcursocategorias.'">'.$cursocategoria->nombre.' '.$cursocategoria->edadInicio.' - '.$cursocategoria->edadFin.' <span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted">'.grupoController::numeroCategorias($request->input('periodofiltro'),$cursocategoria->idcursocategorias).'</span></button>'.
                         '</td>';
                    }
               
                 }//fin $request->input('value')==0
                 else{
                    if($request->input('value')==$cursocategoria->idcursocategorias){
                        $outputCategorias.='<td>'.
                            '<button type="button" class="btn btn-mint active filtrar"'.
                            'value="'.$cursocategoria->idcursocategorias.'">'.$cursocategoria->nombre.' '.$cursocategoria->edadInicio.' - '.$cursocategoria->edadFin.' <span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted">'.grupoController::numeroCategorias($request->input('periodofiltro'),$cursocategoria->idcursocategorias).'</span></button>'.
                         '</td>';
                     }else{
                        $outputCategorias.='<td>'.
                            '<button type="button" class="btn btn-mint filtrar"'.
                            'value="'.$cursocategoria->idcursocategorias.'">'.$cursocategoria->nombre.' '.$cursocategoria->edadInicio.' - '.$cursocategoria->edadFin.' <span style="font-size: 11px; color: white;background-color: gray" class="badge badge-primary text-xs text-muted">'.grupoController::numeroCategorias($request->input('periodofiltro'),$cursocategoria->idcursocategorias).'</span></button>'.
                         '</td>';
                    }
                 }//fin else de $request->input('value')==0

             }
             $titulo='<h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px;">GRUPOS DE '.$request->input('titulo').' '.$year.' '.$curso->modulos.'</strong></p></h3>';

             return Response::json([
                'outputGrupos'=>$outputGrupos,
                'outputCategorias'=>$outputCategorias,

                'titulo'=>$titulo,
                //'selectModulo'=>$curso->modulos,/////parametros 
               // 'selectCurso'=>$curso,
               // 'year'=>$year,
                ]);
            return Response::json($output);
        }
          return Response::json($grupos);

        
    }//fin filtrar


    public function create(Request $request){
    	$cupos=$request->input('cupos');
    	$numGrupo=$request->input('numGrupos');
    	$nivel=$request->input('nivel');
    	$idcursocategorias=$request->input('idcursocategorias');
    	$idcursos=$request->input('idcursos');
 

    	$cursos=curso::find($idcursos);
        $year=date("Y");
    	
    	if($cursos->modulos=="5 MODULOS"){
    		$modulos="5";
    	}else{
    		$modulos="10";

    	}
    	$periodo=periodo::where('nombre',$modulos)->where('estado','ACTIVO')->where('anho',$year)->get()->first();
//return Response::json($periodo);
   
    	for ($i=1; $i <=$numGrupo ; $i++) { 
    		//return Response::json('entro');
  
    		 $message= grupo::create([
		      //'numperiodo'=> $i,
		      'cupos'=> $cupos,
		      'numGrupo'=> $i,
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

    public function update(Request $request,$idgrupos){
         $message=grupo::find($idgrupos);
        //return Response::json($message);

         $message->fill([
           'cupos'=> $request->input('cupos'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json([
            'bandera' =>1,
            'response'=>'Cupos Actualizados',                
             ]);
        }else{
             return Response::json([
            'bandera' =>0,
            'response'=>'No pudo Modificar',                 
             ]);
            
        }
    }//fin update


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

    public function buscarPeriodos(Request $request){
        $hiddenModulo=$request->input('hiddenModulo');
        $anhofiltro=$request->input('anhofiltro');
         if($hiddenModulo=="5 MODULOS"){
                $modulos='5';
             }else{
                 $modulos='10';
        }
        $periodos=periodo::where('nombre',$modulos)->where('anho',$anhofiltro)->get();
       
         return Response::json([
            'periodos'=>$periodos,
                           
             ]);

    }//fin buscarPeriodos

    public function buscarCategoriasPeriodofiltro(Request $request,$idcursos){
        //$message = periodo::find($id);
       // $hiddenModulo=$request->input('hiddenModulo');
        $anhofiltro=$request->input('anhofiltro');
        //if($hiddenModulo==)
        $curso=curso::find($idcursos);
        if($curso->modulos=="5 MODULOS"){
                $modulos='5';
             }else{
                 $modulos='10';
        }
        $periodos=periodo::where('nombre',$modulos)->where('anho',$anhofiltro)->get();
        $categorias=DB::table('cursocategorias')
         ->join('categorias', 'cursocategorias.idcategorias', '=', 'categorias.id')
         ->select('categorias.*','cursocategorias.id as idcursocategorias')

         //->where("cursos.ididiomas",$ididiomas->id)
         ->where("cursocategorias.idcursos",$idcursos)
         ->get();

        return Response::json([
            'categorias' =>$categorias,
            'periodos'=>$periodos,
            'modulos'=>$curso->modulos, 
                            
             ]);
         return Response::json($categorias);

    }//fin buscarCategoriasfiltro

     public function buscarNiveles($idcursocategorias){
    	$message = nivel::where('idcursocategorias',$idcursocategorias)->get();
    	
         return Response::json($message);

    }//fin buscarNiveles

    public function busquedaAula($texto){
        $output="";
            $messages=aula::where('nombre','like','%'.$texto.'%')
            ->orWhere('capacidad','like','%'.$texto.'%')
            ->where("estado","ACTIVO")
            ->limit(4)
            ->get();

               // return Response::json($messages);
            if($messages){
                foreach ($messages as $key => $message) {
               
                    $output.='<tr>'.
                                            '<td align="center" >'.
                                                    '<i class="pli-board icon-lg" style="padding-top: 5pX"></i>'.
                                                    //'<i class="pli-business-man-woman icon-sm" style="padding-top: 5pX"></i>'.

                                                
                                            '</td>'.
                                            '<td>'.
                                                '<div class="comment-header">'.
                                                    '<label class="media-heading box-inline text-main text-sm text-semibold ">Aula '.$message->nombre.'</label>'. 
                                                    '<p class="text-muted text-xs">Capacidad '.$message->capacidad.' personas </p>'.


                                                '</div>'.
                                            '</td>'.
                                            '<td align="center">';
                     if($message->estado=='ACTIVO'){
                        $output.='<button class="btn btn-default btn-trans btn-sm  btn-hover add-tooltip btnAsigAulaDocente" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>'.
                                                '</td>'.

                                            '</tr>';
                     }else{
                         $output.= '<button class="btn btn-default btn-trans btn-sm  btn-hover add-tooltip btnAsigAulaDocente" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'" disabled="true">Inactivo </button>'.
                                                '</td>'.

                                            '</tr>';
                    }//fin else
                }
                return Response::json($output);
            }
    }

    public function busquedaDocente($texto){
         $output="";
        $messages=docente::where('nombre','like','%'.$texto.'%')
        ->orWhere('apellido','like','%'.$texto.'%')
        //->where("estado","ACTIVO")
        ->limit(4)
        ->get();

            //return Response::json($messages);
        if($messages){
            foreach ($messages as $key => $message) {
                    $output.='<tr>'.
                                            '<td align="center" >'.
                                                    '<i class="pli-professor icon-lg icon-lg" style="padding-top: 5pX"></i>'.
                                                    //'<i class="pli-business-man-woman icon-sm" style="padding-top: 5pX"></i>'.

                                                
                                            '</td>'.
                                            '<td>'.
                                                '<div class="comment-header">'.
                                                    '<label class="media-heading box-inline text-main text-sm text-semibold ">'.$message->nombre.' '.$message->apellido.' </label>'. 
                                                    '<p class="text-muted text-xs">'.$message->email.'</p>'.


                                                '</div>'.
                                            '</td>'.
                                            '<td align="center">'.
    '<button class="btn btn-default btn-trans btn-sm  btn-hover  add-tooltip btnAsigAulaDocente" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>'.
                                            '</td>'.

                                        '</tr>';
                
                
            }
            return Response::json($output);
        }

    }
    
    public function updateAula(Request $request,$idgrupos){
        $message=grupo::find($idgrupos);
        //return Response::json($message);

         $message->fill([
           'idaulas'=> $request->input('idaulas'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            $message=aula::find($request->input('idaulas'));
            return Response::json([
            'bandera' =>1,
            'response'=>'Aula '.$message->nombre.' Asignada Exitosamente',
            'nomAula'=>''.$message->nombre, 
            'toggle'=>2,                
             ]);
        }else{
             return Response::json([
            'bandera' =>0,
            'response'=>'No pudo asignarse',                 
             ]);
            
        }
        //return Response::json($message);
    }
    public function updateDocente(Request $request,$idgrupos){
        $message=grupo::find($idgrupos);
        //return Response::json($message);

         $message->fill([
           'iddocentes'=> $request->input('iddocentes'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            $message=docente::find($request->input('iddocentes'));
            return Response::json([
            'bandera' =>1,
            'response'=>'Teacher '.$message->nombre.' Asignado Exitosamente',
            'nomDocente'=>''.$message->nombre.' '.$message->apellido, 
            'toggle'=>1,                
             ]);
        }else{
             return Response::json([
            'bandera' =>0,
            'response'=>'No pudo asignarse',                 
             ]);
            
        }
        //return Response::json($message);
    }
}
