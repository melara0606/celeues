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
use App\estudiante;

use App\estudiantegrupo;

use App\ponderacion;
use App\nota;
use App\Evaluaciones;
use App\EvaluacionesPonderaciones;




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

    /** Funcion interna sin WS que muestra para usuarios de docente */
     public function showGruposUserDocente(){
      // return Response::json("sdds");
      
      $usuarioActual=\Auth::user();
      $docente=docente::where('idusers',$usuarioActual->id)->first();
     // return Response::json($docente);
 
    $gruposFinalizados=grupo::where('iddocentes',$docente->id)
      ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
      ->where('grupos.estado','FINALIZADO')     
      ->select('grupos.*')
      ->orderBy('nivels.numNivel','ASC')
      ->orderBy('grupos.numGrupo','ASC')
      ->get();
      $gruposActuales=grupo::where('iddocentes',$docente->id)
      ->leftJoin('nivels', 'grupos.idnivels', '=', 'nivels.id')
      ->where('grupos.estado','!=','FINALIZADO')     
      ->select('grupos.*')
      ->orderBy('nivels.numNivel','ASC')
      ->orderBy('grupos.numGrupo','ASC')
      ->get();
      //$grupos=grupo::where()s
      $idiomas=idioma::where('estado','ACTIVO')->get();

      $infoJSON=[//Docente',[
        'gruposActuales'=>$gruposActuales, 
        'gruposFinalizados'=>$gruposFinalizados,           
       ];
           return view('grupos.showGruDocente',$infoJSON);

    }
    /** Funcion interna sin WS que muestra para usuarios de admin */
    public function showGruposAdmin(){
 //$usuarioActual=\Auth::user();
 //return Response::json(decrypt  ($usuarioActual->password));
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
                $modulos="5";
             }else{
                 $modulos="10";
             }
        $periodos=periodo::where('nombre',$modulos)->where('anho',$year)->get();
        $periodoActual=periodo::where('nombre',$modulos)->where('estado','ACTIVO')->where('anho',$year)->get()->first();
        /*return Response::json([
            'periodos'=>$periodos,
           'anhos'=>$anhos,
            'modulos'=>$modulos,
            'year'=>$year,
             
        ]);*/
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

            $evaluaciones=Evaluaciones::get();
        //return Response::json($evaluaciones);
            $infoJSON=[//Docente',[
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
                 'evaluaciones'=>$evaluaciones        
                ];

         return view('grupos.showGrupos',$infoJSON);
        
      
    }//fin show

    public function show(){
        $usuarioActual=\Auth::user();
        if($usuarioActual->tipo=='ADMIN'){
            return ($this->showGruposAdmin());
        }else if($usuarioActual->tipo=='DOCENTE'){
            return ($this->showGruposUserDocente());
        }
       
    }

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
                 '<div class="panel pos-rel" style="border: 1px solid #ccc;box-shadow: 1px 1px 3px #bbbbbb !important; border-radius: 5px;">'.
                    '<div class="pad-all text-left " style="border-top-left-radius:15px; border-top-right-radius:15px">
                        <div class="comments media-block">
                                <div class="media-body">
                                    <div class="comment-header">
                                        <div class="" style="width: 100%;height: 25px;display: inline-block;">'.
                                        '<a href="" style="" class="media-heading  text-md box-inline  text-main text-semibold ">'.ucwords(strtolower(grupoController::verIdioma($grupo->ididiomas))).' Nivel '.$grupo->numNivel.' '. $seccion[$grupo->numGrupo].'  </a>

                                         <a style="float: right; " class="media-heading box-inline text-md text-main  text-semibold  text-xs updateAula" data-name="name" data-type="text" data-pk="'.$grupo->id.'" data-title="Enter name">
                                            ';
                                            if($grupo->idaulas==null){
                                                
                                                 $outputGrupos.='    <p  class="text-lg" id="aula'.$grupo->idgrupos.'" ><i class="pli-board icon-sm"></i> <u>N/A</u></p>';
                                           
                                            }else{
                                                 $outputGrupos.='<p class="text-lg" id="aula'.$grupo->idgrupos.'" style="color: green"><i class="pli-board icon-sm"></i> '.ucwords(strtolower(grupoController::verAula($grupo->idaulas))) .'<u></u></p>';
                                            }
                                        
                         $outputGrupos.=' </a>
                                         </div>
                                         <div class="" >
                                        <p class="text-muted text-sm " style="display: inline-block;">'.ucwords(strtolower(grupoController::verCategoria($grupo->idcategorias))).'| <i class="pli-professor icon-lg"></i>&nbsp </p>';

                                            if($grupo->iddocentes==null){                                 
                                                    $outputGrupos.='   <p class="text-muted text-sm " id="docente'.$grupo->idgrupos.'" style="display: inline-block;"><u>N/A</u></p>';
                                            }else{
                                                    $outputGrupos.='  <p class="text-muted text-sm text-semibold" id="docente'.$grupo->idgrupos.'" style="display: inline-block; color: green">'.ucwords(strtolower(grupoController::verDocente($grupo->iddocentes))).'</p>';
                                             }
                     $outputGrupos.='   </div>';
                                             if($grupo->estadoGrupo=="INICIADO"){
                                                     $outputGrupos.='<p class=" media-left text-sm "><span id="estado'.$grupo->idgrupos.'" class="label bg-gray text-sm">Iniciado</span>&nbsp&nbsp 30 Inscritos</p>';
                                              }

                                             if($grupo->estadoGrupo=="EN CURSO"){
                                                    $outputGrupos.='<p class=" media-left text-sm "><span id="estado'.$grupo->idgrupos.'" class="label badge-primary text-sm">En curso</span>&nbsp&nbsp 30 Inscritos</p>';
                                              }

                                             if($grupo->estadoGrupo=="FINALIZADO"){
                                                    $outputGrupos.='<p class=" media-left text-sm "><span id="estado'.$grupo->idgrupos.'" class="label bg-danger text-sm">Finalizado</span>&nbsp&nbsp 30 Inscritos</p>';
                                             }
                  $outputGrupos.='     </div>
                                    
                                     <!-------------------------------------->
                            <div class="text-right" style="padding-top: 15px">
                                <button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip deleteGrupo" data-original-title="Eliminar grupo" data-container="body" value="'.$grupo->idgrupos.'"><i class="demo-pli-remove icon-md " ></i> </button>

                                <button onclick="" class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip asigNotas" data-cupos="'.$grupo->cupos.'" data-original-title="Asignar Notas" data-container="body" value="'.url('/').'/grupos/notas/'.$grupo->idgrupos.'"><i class="pli-notepad icon-lg " ></i> </button>
                                <button onclick="" class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip asigEstudiantes" data-original-title="Listado de Estudiantes" data-container="body" value="'.url('/').'/grupos/estudiantes/'.$grupo->idgrupos.'"><i class="pli-student-male-female icon-lg " ></i> </button>
                                <button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip asigAula" data-original-title="Asignar Aula" data-container="body" value="'.$grupo->idgrupos.'"><i class="pli-board icon-lg"></i></button>
                                <button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip asigDocente" data-original-title="Asignar Docente" data-container="body" value="'.$grupo->idgrupos.'"><i class="pli-professor icon-lg" ></i> </button>
                                <button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip infoModal" data-original-title="Información" data-container="body" value="'.$grupo->idgrupos.'"><i class="demo-pli-exclamation icon-lg " ></i> </button>
                           
                                 
                                <button class="btn btn-icon btn-trans btn-xs media-right btn-hover add-tooltip editarmodal" data-cupos="'.$grupo->cupos.'" data-original-title="Modificar Cupos" data-container="body" value="'.$grupo->idgrupos.'"><i class="demo-psi-pen-5 icon-md " ></i> </button>       

                             </div>
                                    

                                </div>
                        </div>
                    </div>
                    
                 </div>
                
            </div>
            
        </div>
        ';
          /*  $outputGrupos.='<div class="col-md-6 single-item">'.
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
                
            '</div>';*/
           
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
        $idevaluacion=$request->input('idevaluacion');

    	$cursos=curso::find($idcursos);
        $year=date("Y");
    	
    	if($cursos->modulos=="5 MODULOS"){
    		$modulos="5";
    	}else{
    		$modulos="10";

    	}

         DB::beginTransaction();
          
        try {
   
        	//-- Periodo Actual --//
            $periodo=periodo::where('nombre',$modulos)->where('estado','ACTIVO')->where('anho',$year)->get()->first();
           
        	//for ($i=1; $i <=$numGrupo ; $i++) { 

                $grupos=grupo::where('numGrupo',$numGrupo)->where('idnivels',$nivel)->where('idperiodos',$periodo->id)->get();

                //-- VErifica si existe un grupo con los mismos paramteros --//                         
                if(count($grupos)>0){
                     return Response::json([
                        'bandera'=>0,
                        'response'=>'Ya existe un grupo con esos registros',
                     ]);
                }
               
       
        		 $message= grupo::create([
    		      //'numperiodo'=> $i,
    		      'cupos'=> $cupos,
    		     // 'numGrupo'=> $i,
    		      'numGrupo'=> $numGrupo,
                  'idnivels'=>$nivel,
    		     'idperiodos'=>$periodo->id,
    		      'estado'=> "INICIADO",
    		      ]);
                 if($idevaluacion>0){   
                        $ponderaciones=EvaluacionesPonderaciones::where('evalucion_id',$idevaluacion)->get();
                 }else{
                     DB::rollback();
                        return Response::json([
                       'bandera'=>0,
                        'response'=>'debe ingresar una ponderacion de notas',
                         ]); 
                 }
                 //return Response::json($idevaluacion);
                 $contador=1;
                 foreach ($ponderaciones as $key => $ponderacion) {
                     
                     ponderacion::create([
                    'correlativo'=> $contador,
                    'nombreEvaluacion'=>$ponderacion->titulo,
                    'ponderacion'=>$ponderacion->ponderacion,
                    'idgrupos'=>$message->id,         
                    ]);
                     $contador++;
                 }

                                   
    	    		
        	//}

            DB::commit();
        	return Response::json([
    		    'bandera'=>1,
    		    'response'=>'Registro Guardado extisamente',
    		 ]);

        } catch (\Throwable $e) {
          DB::rollback();
          return Response::json([
                'bandera'=>0,
                'response'=>'ocurrio un error en el servidor',
                ]); 
         
       }////fin catch

    	


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
    public function buscarEvaluaciones($idevaluacion){
        $message=EvaluacionesPonderaciones::where('evalucion_id',$idevaluacion)->get();

        return Response::json($message);        
    }//Fin buscarEvaluaciones

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
                                            '</td>';
                        if($message->idusers==null || $message->estado=='INACTIVO'){
                            if($message->idusers==null){
                                 $output.= '<td align="center">'.
    '<button class="btn btn-default btn-trans btn-sm  btn-hover  add-tooltip btnAsigAulaDocente" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'" disabled>Sin Usuario </button>'.
                                            '</td>';

                            }else{
                            $output.= '<td align="center">'.
                            '<button class="btn btn-default btn-trans btn-sm  btn-hover  add-tooltip btnAsigAulaDocente" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'" disabled>Inactivo<i class="demo-psi-arrow-right icon-md "></i> </button>'.
                                                                    '</td>';
                            }
                        }else{

                                            $output.= '<td align="center">'.
    '<button class="btn btn-default btn-trans btn-sm  btn-hover  add-tooltip btnAsigAulaDocente" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>'.
                                            '</td>';
                        }



                                         $output.='</tr>';
                
                
            }
            return Response::json($output);
        }

    }
    
    public function updateAula(Request $request,$idgrupos){
        $message=grupo::find($idgrupos);
        //return Response::json($message->aulas);
        $existe=grupo::where('idperiodos',$message->periodos->id)
        ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
        ->where('idaulas',$request->input('idaulas'))
        ->where('idcursos',$message->nivels->idcursos)
        ->get();
        if(count($existe)==0){
            if ($message->iddocentes==null) {
                $message->fill([
            'idaulas'=> $request->input('idaulas'),
                ]);
            }else{
            $message->fill([
            'idaulas'=> $request->input('idaulas'),
            'estado'=> 'EN CURSO'
                ]);
            }
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
        }else{
            return Response::json([
                'bandera' =>0,
                'response'=>'Aula '.aula::find($request->input('idaulas'))->nombre .' ya esta asignada a otro grupo en este curso',                 
                ]);
        }
        //return Response::json($message);
    }
    public function updateDocente(Request $request,$idgrupos){
        $message=grupo::find($idgrupos);
        //return Response::json($message->nivels->idcursos);
        $existe=grupo::where('idperiodos',$message->periodos->id)
        ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
        ->where('iddocentes',$request->input('iddocentes'))
        ->where('idcursos',$message->nivels->idcursos)
        ->get();
        
       // return Response::json($existe);
        //return Response::json(count($existe));
        if(count($existe)==0){
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
        }else{
            return Response::json([
                'bandera' =>0,
                'response'=>'Docente ya esta asignado a otro grupo en este curso',                 
                ]);
        }
        //return Response::json($message);
    }

    /* Metodo que finaliza el Grupo
    **
    */
    public function finalizarGrupo(Request $request){
       /* return Response::json([
            'bandera' =>1,
            'response'=>'Pruebas',                 
            ]);*/
        $message=grupo::find($request->input('idgrupo'));
        $message->fill([
            'estado'=> 'FINALIZADO',
              ]);
        
       if($message->save()){
        return Response::json([
            'bandera' =>1,
            'response'=>'Se Finalizo el Grupo exitosamente',                 
            ]);
       }else{
        return Response::json([
            'bandera' =>0,
            'response'=>'No se pudo finalizar el grupo',                 
            ]);
       }

    }

    /* Metodo que visualisza pantalla de Traspaso de Grupo
    **
    */
     public function showTraspasoGrupo(){
       $idiomas=idioma::latest()->get();  
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
          $estudiante=estudiante::latest()->get();  
        //return Response::json($message);
         return view('grupos.showTraspasoGrupo',[
            'cursos'=>$curso,
             'categorias'=>$cursocategorias,
        'estudiantes'=>$estudiante,
                  
     ]);

    }
    public function obtenerGruposTraspaso(Request $request){
            $idcurso=$request->input('cursofiltro');
            //$year=$request->input('anhofiltro');
            $idcursocategorias=$request->input('categoriafiltro');

            $curso=curso::find($idcurso);
            if($curso->modulos=="5 MODULOS"){
                $modulos="5";
             }else{
                 $modulos="10";
             }

              $year=date("Y");
             // $periodos=periodo::where('nombre',$modulos)->where('anho',$year)->get();
              $periodoActual=periodo::where('nombre',$modulos)->where('estado','ACTIVO')->where('anho',$year)->first();
        
            /*   $grupos=DB::table('grupos')
              ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
              ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
              ->select('grupos.*','nivels.*','grupos.id as idgrupos','grupos.estado as estadoGrupo')
              //->where('periodos.anho',$year)
              ->where('periodos.id',$periodoActual->id)
             // ->where('grupos.estado','INICIADO')
              //->where('nivels.idcursos',$idcurso)//no se si son necesaios
              //->where('periodos.nombre',$modulos)//no se si son necesaios
              ->where('nivels.idcursocategorias',$idcursocategorias)/////parametros
              ->orderBy('nivels.numNivel')
              ->orderBy('grupos.numGrupo')
              
              ->get();*/

            //  return Response::json($periodoActual);
              $seccion = array('1' =>'A' ,
                                '2' =>'B' ,
                                '3' =>'C' ,
                                '4' =>'D' ,
                                '5' =>'E' ,
                                '6' =>'F' ,
                                
                             );
              $grupos=grupo::Where('idperiodos',$periodoActual->id)
             // ->with('nivels')->with('periodos')
             // ->has('nivels')
            /*  ->whereHas('nivels',function($q) use ($idcursocategorias){
                   $q->where('idcursocategorias', $idcursocategorias);
               })*/
              ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
              ->select('grupos.*')
              ->where('idcursocategorias', $idcursocategorias)
              ->orderBy('numNivel','ASC')
              ->orderBy('numGrupo','ASC')
              ->get();
              foreach ($grupos as $key => $grupo) {
                if (count($grupos)>0) {
                  //  $msj=grupo::find($grupo->id);
                    $selectOption=$grupo->numNivel;
                   $grupo['nombreGrupo']=$grupo->nivels->idiomas->nombre." NIVEL ".$grupo->nivels->numNivel.
                   ' '.$seccion[$grupo->numGrupo];
                }
                  
              }
              
              return Response::json($grupos);

    }

    public function obtenerEstudiantes(Request $request){
        $idgrupos=$request->input('idgrupofiltro');
        $estudiantegrupos=DB::table('estudiantegrupos')
          ->join('estudiantes', 'estudiantegrupos.idestudiantes', '=', 'estudiantes.id')
          ->select('estudiantes.*','estudiantegrupos.estado as estadoEstudiante','estudiantegrupos.id as idestudiantegrupo','estudiantegrupos.idgrupos')
          ->where('estudiantegrupos.idgrupos',$idgrupos)
          ->get();
        $table="";
          $i=1;
          if($request->input('idgrupofiltro')==$request->input('idgrupoUno')){
             return Response::json(['msj'=>'No puede selecionar el mismo grupo']);
          }
        /* $table.= '<thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Acciones</th>

                                </tr>
                            </thead>
                            <tbody  >';
                            */

          foreach ($estudiantegrupos as $estudiantegrupo) { 
          if($estudiantegrupo->estadoEstudiante!='TRASLADADO'){      
            $table.='<tr id="trow'.$estudiantegrupo->id.'">
                    <td class="" align="center" >'.$i++.'</td>
                    <td style="width: 45%" align="left">
                        <div class="comment-header">
                            <label class="media-heading box-inline text-main text-sm text-semibold ">'.$estudiantegrupo->nombre.' '.$estudiantegrupo->apellido.' </label> 
                        

                        </div>
                    </td>
                    
                    <td class="" align="center">';
                    if($request->input('numTable')==1){
                    $table.='<button class="btn btn-default btn-trans btn-xs  btn-hover btn-primary  add-tooltip traspasar" data-nombre="'.$estudiantegrupo->nombre.' '.$estudiantegrupo->apellido.'" data-container="body" data-grupo="'.$estudiantegrupo->idgrupos.'" value="'.$estudiantegrupo->id.'">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>';
                    }else{
                        $table.='';
                    }
                  $table.='   </td>
                     </tr>';
                        //<td class="">'.$estudiantegrupo->nombre.' '.$estudiantegrupo->apellido.' </td>
            }
          }

         /*  if($request->input('numTabla')==1){
                    $table.='<button class="btn btn-default btn-trans btn-sm  btn-hover btn-primary  add-tooltip btnCreateEstudiante" data-original-title="Asignar Aula" data-container="body" value="4">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>';
                    }else{
                        $table.='<button class="btn btn-default btn-trans btn-sm  btn-hover btn-primary  add-tooltip btnCreateEstudiante" data-original-title="Asignar Aula" data-container="body" value="4">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>';
                    }
               $table.='</td>*/
          // $table.= '</tbody>';
         return Response::json($table);
          
    }

    public function transferirEstudiante(Request $request){
        $idgrupoInicial=$request->input('idgrupoInicial');
        $idestudiante=$request->input('idestudiante');
        $idGrupoDestino=$request->input('idGrupoDestino');

        $estudiantegrupoInicial=estudiantegrupo::Where('idestudiantes', $idestudiante)
        ->where('idgrupos',$idgrupoInicial)->get();

        $estudiantegrupoDestino=estudiantegrupo::Where('idestudiantes', $idestudiante)
        ->where('idgrupos',$idGrupoDestino)->get();
        if(count($estudiantegrupoDestino)==0 && count($estudiantegrupoInicial)>0 ){
                
              //----------// TRNSACCION //----------/
                DB::beginTransaction();
                try{    
                    $estadoInicial=$estudiantegrupoInicial->first()->estado;
                    $var='';
                    $message=estudiantegrupo::find($estudiantegrupoInicial->first()->id);   
                      $message->fill([
                         'estado'=> 'TRASLADADO',
                           ]);
                    if($message->save()){
                        $registro=estudiantegrupo::create([
                            'pago'=> 0.0,
                            'idgrupos'=>$idGrupoDestino,
                            'idestudiantes'=>$idestudiante,
                            'idcursocategorias'=>grupo::find($idGrupoDestino)->first()->nivels->idcursocategorias,
                            'estado'=> $estadoInicial,
                            'notaFinal'=>0.00,
                            'idanteriorgrupos'=> $idgrupoInicial,
                           ]);   
                        $var='Guardo';

                      
                    }   

        // return Response::json($table);

                    if($estadoInicial=='ACTIVO' && $var=='Guardo'){
                        $ponderacions=ponderacion::where('idgrupos',$idGrupoDestino)->get();

                          if(count($ponderacions)>0){
                                foreach($ponderacions as $ponderacion) {
                                        nota::create([
                                        'nota'=> 0,
                                        'idestudiantegrupos'=>$registro->id,
                                        'idponderacions'=>$ponderacion->id,
                                        ]);  
                                
                              }///fn foreach
                            }///fin if
                            // bitacoraController::bitacora('Modificó datos de peticion');            
                    }

                    //----------// fin try  //----------/
                    DB::commit();
                     return Response::json([
                        'bandera'=>1,
                        'response'=>"Estudiante trasladado con exito", 
                     ]);

                } catch (\Throwable $e) {
                  DB::rollback();
                  return Response::json([
                        'bandera'=>0,
                        'response'=>'error en registrar a la BD '+$e ,
                        ]); 
                 
               }////fin catch

        }else{
            return Response::json([
                'bandera'=>2,
                'response'=>'Ya existe estudiante en ese grupo',
             ]);

        }


    }

}
