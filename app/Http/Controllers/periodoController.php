<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\periodo;

use App\estudiantegrupo;

use App\nivel;
use App\grupo;
use App\curso;
use App\ponderacion;
use Illuminate\Support\Facades\Response;


use Illuminate\Support\Facades\DB;

class periodoController extends Controller
{
    //
     public function show(){
       $year=date("Y");
//return Response::json($year);
     	$periodos=periodo::where('anho',$year)->where('nombre','10')->get();
          $anhos=periodo::distinct()->get(['anho']);
          //$periodos=periodo::where('nombre',10)->where('año',)->get();


        	  return view('periodos.showPeriodo',[
            	 'periodos' => $periodos,
               'anhos' => $anhos,
               'selectYear'=>$year,
               'selectPeriodo'=>10,
        	//'noticias'=> $noticias,
            	]);
      }
     public function create(Request $request){//createBeneficiariosRequest $request){
$contperiodo=count(periodo::where('nombre',$request->input('nperiodo'))->where('anho',$request->input('anho'))->get());

//return Response::json($contperiodo);

    //$message = periodo::create($request->all());
//return Response::json($request);
//$var=$request->input('modalidad');
$var=0;
if($request->input('nperiodo')=="5"){
$variable=5;
$var="1";
}else {
  $variable=10;
  $var="0";
}
if ($contperiodo==0) {
  // code...
  for ($i=1; $i <= $variable; $i++) {
    $message= periodo::create([
      //'numperiodo'=> $i,
      'nombre'=> $request->input('nperiodo'),
      'anho'=> $request->input('anho'),
      'fechaIni'=>$request->input('fechaIni'),
      'iniPago'=>$request->input('iniPago'),
      'fechaFin'=>$request->input('fechaFin'),
      'finPago'=>$request->input('finPago'),
      'numPeriodo'=>$i,
          'estado'=> "INACTIVO",
      ]);
    }
      return Response::json([
        'bandera'=>1,
        'response'=>'Registro Guardado Exitosamente',
        ]);

} else {

  return Response::json([
    'bandera'=>0,
    'response'=>'ya existe un registro con esos parametros!',
    ]);
}



  // code...
}

      public function update(Request $request, $id){
        //dd($request->all());
        $message = periodo::find($id);
      //  return Response::json($message);
        $message->fill([
          'fechaIni'=>$request->input('fechaIni'),
          'iniPago'=>$request->input('iniPago'),
          'fechaFin'=>$request->input('fechaFin'),
          'finPago'=>$request->input('finPago'),
            ]);
        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
          return Response::json([
            'bandera'=>1,
            'response'=>'Regristro Modificado Exitosamente!',
            ]);
          }else
          return Response::json([
            'bandera'=>1,
            'response'=>'No pudo Modificarse',
            ]);
                

    }
    public function filtrar($anho,$nperiodofiltro){
      $message=periodo::where('anho',$anho)->where('nombre',$nperiodofiltro)->get();
      return Response::json($message);


    }

    public function buscar($id){
        $periodo = periodo::find($id);
    //return Response::json( bitacoraController::bitacora('vio info de beneficiario'));
    // bitacoraController::bitacora('Visualizó informacion de un beneficiario con nombre '.$beneficiario->nombre);
    return Response::json($periodo);
    }

    public function cambiarEstado(Request $request,$id){
        $message = periodo::find($id);
        
        if ($request->input('estado')==0) {
            $message->fill([
            'estado'=>'INACTIVO',
            ]);
        }else if ($request->input('estado')==1) {
          $periodo=periodo::where('estado','ACTIVO')->where('nombre',$message->nombre)->first();
          if($periodo!=null){
            $periodo->fill([
              'estado'=>'CURSADO',
              ]);
              if($periodo->save()){}
          }
            $message->fill([
            'estado'=>'ACTIVO',
            ]);
        }

        if($message->save()){
          // bitacoraController::bitacora('Modificó datos de peticion');
            return Response::json('Cambio de Estado Exitoso');
            }else
                return Response::json('No pudo cambiar de Estado');

    }

    public function showImportarBlade(){
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

        return view('periodos.showImportarGrupos',[
          'cursos'=>$curso,
          'fe'=>'fd',
                      
        ]);
    }

    public function obtenerGrupos(Request $request){      
      $idcurso=$request->input('cursofiltro');
      $idcursocategorias=$request->input('idcursocategoriafiltro');

      $curso=curso::find($idcurso);
      if($curso->modulos=="5 MODULOS"){
          $modulos="5";
       }else{
           $modulos="10";
       }

        $year=date("Y");
        $periodoActual=periodo::where('nombre',$modulos)->where('anho',$year)->where('estado','ACTIVO')->first();//->where('anho',$year)->first();
          if($modulos=="5"){
            $var=$periodoActual->numPeriodo -1;
          }else if($modulos=="10"){
            $var=$periodoActual->numPeriodo -1;
          }
          if($periodoActual->numPeriodo -1==0){
            if($modulos=="5"){
              $var=5;
            }else if($modulos=="10"){
              $var=10;
            }
            $year=$year-1;
          }
         /* return Response::json([
          'actual'=>$var,
          'anterior'=>$year,
          ]);*/
        $periodoAnterior=periodo::where('nombre',$modulos)->where('anho',$year)->where('numPeriodo',$var)->first();//->where('anho',$year)->first();

        $gruposActual=grupo::Where('idperiodos',$periodoActual->id)
        ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
        ->select('grupos.*')
        ->where('nivels.idcursocategorias', $idcursocategorias)
        ->orderBy('nivels.numNivel','ASC')
        ->orderBy('grupos.numGrupo','ASC')
        ->get();

        $gruposAnterior=grupo::Where('idperiodos',$periodoAnterior->id)
        ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
        ->select('grupos.*')
        ->where('nivels.idcursocategorias', $idcursocategorias)
        ->orderBy('nivels.numNivel','ASC')
        ->orderBy('grupos.numGrupo','ASC')
        ->get();
      // return Response::json($periodoAnterior);
        $tableActual="";
        $tableAnterior="";
        $i=1;
        $j=1;
       foreach ($gruposActual as $grupo) { 
              $tableActual.='<tr id="trowA'.$grupo->id.'">
              <td class="" align="center" >'.$i++.'</td>
              <td style="width: 45%" align="left">
                  <div class="comment-header">
                      <label class="media-heading box-inline text-main text-sm text-semibold ">'.$grupo->nivels->idiomas->nombre.' NIVEL 
                      '.$grupo->nivels->numNivel.'  </label> 
                  

                  </div>
              </td>
              <td class="" align="center">'.$grupo->nivels->categorias->nombre.'</td>
              <td class="" align="center">'.$grupo->estado.'</td>
              <td class="" align="center">';
              $tableActual.='<button class="btn btn-icon btn-default btn-default 
              btn-xs btn-hover-mint add-tooltip verEstudiantes" 
              data-original-title="Estudiantes" data-container="body" value="'.$grupo->id.'">
              <i class="pli-student-male-female icon-lg"></i> 
              </button>';
            $tableActual.='   </td>
              </tr>';
       }
       foreach ($gruposAnterior as $grupo) { 
              $tableAnterior.='<tr id="trowA'.$grupo->id.'">
              <td class="" align="center" >'.$i++.'</td>
              <td style="width: 45%" align="left">
                  <div class="comment-header">
                      <label class="media-heading box-inline text-main text-sm text-semibold ">'.$grupo->nivels->idiomas->nombre.' NIVEL 
                      '.$grupo->nivels->numNivel.'  </label> 
                  

                  </div>
              </td>
              <td class="" align="center">'.$grupo->nivels->categorias->nombre.'</td>
              <td class="" align="center">'.$grupo->estado.'</td>
              <td class="" align="center">';
              $tableAnterior.='<button class="btn btn-icon btn-default btn-default 
              btn-xs btn-hover-mint add-tooltip verEstudiantes" 
              data-original-title="Estudiantes" data-container="body" value="'.$grupo->id.'">
              <i class="pli-student-male-female icon-lg"></i> 
              </button>';
            //  if($grupo->estado=="FINALIZADO"){
                if($grupo->estadoTraspaso == null || $grupo->estadoTraspaso == "NO ENVIADO" ){
                  $tableAnterior.='<button id="tab'.$grupo->id.'" class="btn btn-default btn-trans btn-xs  btn-hover btn-primary  add-tooltip traspasar" data-nombre="" 
                  data-container="body" 
                  data-grupo="" 
                  value="'.$grupo->id.'">enviar<i class="demo-psi-arrow-right icon-xs "></i> </button>';
                }else{
                  $tableAnterior.='<button id="tab'.$grupo->id.'" class="btn btn-default btn-trans btn-xs  btn-hover btn-success  add-tooltip traspasar" data-nombre="" 
                  data-container="body" 
                  data-grupo="" 
                  value="'.$grupo->id.'" disabled>enviado </button>';
                }
             // }
            
            $tableAnterior.='   </td>
              </tr>';
      }

      $periodoAntes="NO HAY REGISTROS DE PERIODO ANTERIOR";
       // $grupos=grupo::get();
       if($periodoAnterior!=null){
        $periodoAntes="PERIODO ".$periodoAnterior->numPeriodo." ".$periodoAnterior->fechaIni." a ".$periodoAnterior->fechaFin;
        
       }
        return Response::json([
          'actual'=>$tableActual,
          'anterior'=>$tableAnterior,
          'periodoActual'=>"PERIODO ".$periodoActual->numPeriodo." ".$periodoActual->fechaIni." a ".$periodoActual->fechaFin,
          'periodoAntes'=>$periodoAntes,
          ]);
        return Response::json($tableActual);



    }
    
    public function obtenerEstudiantes(Request $request){
     // return Response::json("dsf");
      $idgrupos=$request->input('idgrupofiltro');

      $estudiantegrupos=DB::table('estudiantegrupos')
        ->join('estudiantes', 'estudiantegrupos.idestudiantes', '=', 'estudiantes.id')
        ->select('estudiantes.*','estudiantegrupos.estado as estadoEstudiante','estudiantegrupos.id as idestudiantegrupo','estudiantegrupos.idgrupos')
        ->where('estudiantegrupos.idgrupos',$idgrupos)
        ->get();
      $table="";
        $i=1;
        foreach ($estudiantegrupos as $estudiantegrupo) { 
       // if($estudiantegrupo->estadoEstudiante!='TRASLADADO' && $estudiantegrupo->estadoEstudiante!='PREINSCRITO' ){      
          $table.='<tr id="trow'.$estudiantegrupo->id.'">
                  <td class="" align="center" >'.$i++.'</td>
                  <td style="width: 45%" align="left">
                      <div class="comment-header">
                          <label class="media-heading box-inline text-main text-sm text-semibold ">'.$estudiantegrupo->nombre.' '.$estudiantegrupo->apellido.' </label> 
                      

                      </div>
                  </td>
                  
                  <td class="" align="center">';
                 
                $table.=''.$estudiantegrupo->estadoEstudiante.'</td>
                <td><td>
                   </tr>';
        //  }
        }
       return Response::json($table);
        
  }

  public function importarGrupo(Request $request){
    $idgrupo=$request->input('idgrupofiltro');
    $grupo=grupo::find($idgrupo);
    $estudiantegrupos=estudiantegrupo::where('idgrupos',$grupo->id)->get();
    //if($grupo->periodos->nombre=="5"){
      $year=date("Y");
      $periodoActual=periodo::where('nombre',$grupo->periodos->nombre)->where('anho',$year)->where('estado','ACTIVO')->first(); 
      $nivel=nivel::find($grupo->idnivels);
      $nivelActual=nivel::where('numNivel',$nivel->numNivel + 1)
      ->where('ididiomas',$nivel->ididiomas)
      ->where('idcategorias',$nivel->idcategorias)
      ->where('idmodalidads',$nivel->idmodalidads)
      ->where('idcursos',$nivel->idcursos)
      ->where('idcursocategorias',$nivel->idcursocategorias)
      ->first();
      //->get();   
    //}
  /* return Response::json([
      'grupo'=>$grupo,
      'estudiantegrupos'=>$estudiantegrupos,
      'periodoActual'=>$periodoActual,
      'nivelAntes'=> $nivel,
      'nivelActual'=>$nivelActual,
      ]); */


      DB::beginTransaction();
      try {
        $grupo->fill([
          'estadoTraspaso'=>'ENVIADO',
          ]);
        if($grupo->save()){
         /* return Response::json([
            'cupos'=> $grupo->cupos,
            'numGrupo'=> $grupo->numGrupo,
            'idnivels'=>$nivelActual->id,
            'idperiodos'=>$periodoActual->id,
            'estado'=> "INICIADO",
            'estadoTraspaso'=>'NO ENVIADO',
            ]);*/
            $nuevoGrupo = grupo::create([
              'cupos'=> $grupo->cupos,
              'numGrupo'=> $grupo->numGrupo,
              'idnivels'=>$nivelActual->id,
              'idperiodos'=>$periodoActual->id,
              'estado'=> "INICIADO",
              'estadoTraspaso'=>'NO ENVIADO',
            ]);
            
            $ponderaciones=ponderacion::where('idgrupos',$grupo->id)->get();
            $contador=1;
            
          //return Response::json( $ponderaciones);
            foreach ($ponderaciones as $key => $ponderacion) {
                  ponderacion::create([
                  'correlativo'=> $contador,
                  'nombreEvaluacion'=>$ponderacion->nombreEvaluacion,
                  'ponderacion'=>$ponderacion->ponderacion,
                  'idgrupos'=>$nuevoGrupo->id,         
                  ]);
                    $contador++;
            }
            
            foreach ($estudiantegrupos as $estudiantegrupo) { 
              //return Response::json($estudiantegrupo);
                if($estudiantegrupo->notaFinal>=7 && $estudiantegrupo->estado!='PREINSCRITO'){//$estudiantegrupo->notaFinal>=7 &&
                    $message= estudiantegrupo::create([
                      //'numperiodo'=> $i,
                      'pago'=> 0.0,
                      'idgrupos'=>$nuevoGrupo->id,
                      'idestudiantes'=>$estudiantegrupo->idestudiantes,
                      'idcursocategorias'=>$estudiantegrupo->idcursocategorias,
                      'estado'=> "PREINSCRITO",
                      'notaFinal'=>0.00,
                      ]);
                }
              //  return Response::json($message);
          } 
          //return Response::json($message);

        }
        DB::commit();
        return Response::json("Gaurdo");
      } catch (\Throwable $e) {
        DB::rollback();
        return Response::json([
              'bandera'=>0,
              'response'=>'eroor'+$e,
              ]); 
      
      }////fin catch

  }
}
