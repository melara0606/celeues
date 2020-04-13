<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\estudiante;

use App\grupo;
use App\estudiantegrupo;

use App\cursocategoria;
use App\ponderacion;
use App\nota;
use App\idioma;

use App\user;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
class estudianteGrupoController extends Controller
{
    //
  public static function getGrupoInfo($idgrupos){
 
        //$message=user::find($id);
        $msj="";
        $grupos=DB::table('grupos')
          ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
          ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
          ->select('grupos.*','nivels.*','grupos.id as idgrupos','grupos.estado as estadoGrupo')
          ->where('grupos.id',$idgrupos)////////////////////////nno se si sive o no
          ->get()->first();
           $seccion = array('1' =>'A' ,
                            '2' =>'B' ,
                            '3' =>'C' ,
                            '4' =>'D' ,
                            '5' =>'E' ,
                            '6' =>'F' ,
                         );
           $idioma=idioma::find($grupos->ididiomas);
           //$idioma=idioma::find($grupos->ididiomas);
         $msj=$idioma->nombre." NIVEL ".$grupos->numNivel." ".$seccion[$grupos->numGrupo] ; 
      

      return $msj;
  }
    public function show($idgrupos){

     	//$estudiante=estudiante::latest()->get(); 
     	 	$estudiantegrupos=DB::table('estudiantegrupos')
          ->join('estudiantes', 'estudiantegrupos.idestudiantes', '=', 'estudiantes.id')
          ->select('estudiantes.*','estudiantegrupos.estado as estadoEstudiante','estudiantegrupos.id as idestudiantegrupo')
          ->where('estudiantegrupos.idgrupos',$idgrupos)
          ->get();

          $table="";
        $grupo=DB::table('grupos')
          ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
          ->join('aulas', 'grupos.idaulas', '=', 'aulas.id')
          ->join('docentes', 'grupos.iddocentes', '=', 'docentes.id')
          
          ->select('aulas.nombre as nombreAula','docentes.nombre as nombreDocente','docentes.apellido','grupos.cupos','grupos.estado')
          ->where('grupos.id',$idgrupos)
          ->get()
          ->first();
        
        //-- Verificar si ggrupo tiene asignado o no aula o docente --//
        $grupoVerificar=DB::table('grupos')
         
          ->where('grupos.id',$idgrupos)
          ->get()
          ->first();
 //estudianteGrupoController::getGrupoInfo($idgrupos);
      //  return Response::json(estudianteGrupoController::getGrupoInfo($idgrupos));
          if($grupoVerificar->iddocentes!=null && $grupoVerificar->idaulas!=null){


            $table.='<tr>
                    <td class="" >Aula</td>
                    <td class="">'.$grupo->nombreAula.'</td>
                  </tr>';
            $table.='<tr>
                    <td class="">Docente</td>
                    <td class="">'.$grupo->nombreDocente.' '.$grupo->apellido.'</td>
                  </tr>';
             $table.='<tr>
                    <td class="">Cupos</td>
                    <td class="">'.$grupo->cupos.'</td>
                  </tr>';
             $table.='<tr>
                    <td class="">Estado</td>
                    <td class="">'.$grupo->estado.'</td>
                  </tr>';     
          }      
         // ->paginate(7);
  			//return Response::json($grupo);

     	$estudiante=estudiante::latest()->get(); ///quitar luego
        	  return view('pagos.showEstudiantePago',[
            	 'selectGrupo' => $idgrupos, 
            	 'estudiantegrupos' => $estudiantegrupos,
            	  'estudiantes' => $estudiante, ///quitar luego
                'llenarGrupos'=>$table,
                'encabezadoGrupo'=>estudianteGrupoController::getGrupoInfo($idgrupos)
            	]);
      }
      
      public function busquedaEstudiante($texto){
         $output="";
        $messages=estudiante::where('nombre','like','%'.$texto.'%')
        ->orWhere('apellido','like','%'.$texto.'%')
        //->where("estado","ACTIVO")
        ->limit(4)
        ->get();

            //return Response::json($messages);
        if($messages){
            foreach ($messages as $key => $message) {
              $user=user::find($message->idusers);
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
                                            if($user!=null){
                                         $output.='<td align="center">'.
    '<button class="btn btn-default btn-trans btn-sm  btn-hover  add-tooltip btnCreateEstudiante" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'">Asignar<i class="demo-psi-arrow-right icon-md "></i> </button>'.
                                            '</td>';
                                          }else{
$output.='<td align="center">'.
    '<button class="btn btn-default btn-trans btn-sm  btn-hover  add-tooltip btnCreateEstudiante" data-original-title="Asignar Aula"data-container="body" value="'.$message->id.'" disabled>Sin usuario</i> </button>'.
                                            '</td>';
                                          }

                                      $output.= '</tr>';
                
                
            }
            return Response::json($output);
        }

    }//fin buscar Estudiante a grupo

   public function create(Request $request){
    	$idgrupos=$request->input('idgrupos');
    	$idestudiantes=$request->input('idestudiantes');
    	$message=estudiantegrupo::where('idgrupos',$idgrupos)->where('idestudiantes',$idestudiantes)->get();

      
    	$grupo=DB::table('grupos')
          ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
          ->select('nivels.idcursocategorias')
          ->where('grupos.id',$idgrupos)
          ->get()->first();
		//return Response::json($grupo);
        if(count($message)==0){
    	//return Response::json($periodo);
    		 $message= estudiantegrupo::create([
		      //'numperiodo'=> $i,
		      'pago'=> 0.0,
		     'idgrupos'=>$idgrupos,
		      'idestudiantes'=>$idestudiantes,
		      'idcursocategorias'=>$grupo->idcursocategorias,
		      'estado'=> "PREINSCRITO",
		      'notaFinal'=>0.00,
		      ]);
    		 return Response::json([
			    'bandera'=>1,
			    'response'=>'Estudiante preinsicrito extisamente',
			 ]);
    	}else{
    		return Response::json([
			    'bandera'=>0,
			    'response'=>'El estudiante ya se registro en este grupo',
			 ]);
    	}

    }//fin create

    public function cambiarEstado(Request $request,$id){
    	$message=estudiantegrupo::find($id);
    	$opcion=$request->input('estado');

      	if($opcion=="asigOyente"){
      	 	$message->fill([
              'estado'=>'OYENTE',
              ]);
               if($message->save()){
            // bitacoraController::bitacora('Modificó datos de peticion');
          	 return Response::json([
  			    'bandera'=>1,
  			    'response'=>'Estudiante inscito como oyente',
  			 ]);
              }else
               return Response::json([
  			    'bandera'=>0,
  			    'response'=>'No pudo cambirar de Estado',
  			 ]);
      	}else if($opcion=="deleteEstudiante"){
      		$message2=estudiantegrupo::where('id',$id);//->delete();
      		if($message2->delete()){
      			 return Response::json([
  			    'bandera'=>1,
  			    'response'=>'Estudiante removido de grupo',
  			 ]);
      		}
      	}else if($opcion=="asigPago"){

      		$cursocategoria=cursocategoria::find($message->idcursocategorias);
      		$message->fill([
              'estado'=>'ACTIVO',
              'pago'=>$cursocategoria->cuota,
              ]);
               if($message->save()){
                $ponderacions=ponderacion::where('idgrupos',$request->input('idgrupos'))->get();
                  if(count($ponderacions)==0){

                  }else{
                        foreach ($ponderacions as $ponderacion) {
                                nota::create([
                                'nota'=> 0,
                                'idestudiantegrupos'=>$id,
                                'idponderacions'=>$ponderacion->id,
                                ]);  
                        
                      }///fn foreach
                    }///fin else
                    // bitacoraController::bitacora('Modificó datos de peticion');
                  	 return Response::json([
          			    'bandera'=>1,
          			    'response'=>'Estudiante inscito como oyente',
          			 ]);
              }else
               return Response::json([
  			    'bandera'=>0,
  			    'response'=>'No se pudo registrar el pago',
  			 ]);
      	}
       
    }///fin cambiaEstado


    public function createPonderacion(Request $request){
        $idgrupos=$request->input('idgrupos');
        $count=count(ponderacion::where('idgrupos',$idgrupos)->get());
        
        $evaluacion = array('1' =>'Oral Exam 1' ,
            '2' =>'Oral Exam 2' ,
            '3' =>'Final Exam' ,
            '4' =>'HomeWork' ,
            '5' =>'Attendance' ,
            '6' =>'Participation' ,
         );
        $ponderacion = array('1' =>20,
            '2' =>20 ,
            '3' =>30,
            '4' =>10,
            '5' =>10,
            '6' =>10,
         );





    if($count ==0){
      DB::beginTransaction();
          
        try {
   
        
    
         /* */for ($i=1; $i <7 ; $i++) {
              ponderacion::create([
                'correlativo'=> $i,
                'nombreEvaluacion'=>$evaluacion[$i],
                'ponderacion'=>$ponderacion[$i],
                'idgrupos'=>$idgrupos,         
                ]);  
          
            } 
                           

            $messages=estudiantegrupo::where('idgrupos',$idgrupos)
            ->where('estado','ACTIVO')->get();
       /*     return Response::json([
                'bandera'=>0,
                'response'=>$messages,
                ]); 
*/            if (count($messages)==0) {
                DB::commit();
            }else{
              
                foreach($messages as $message) {
                   $rows=ponderacion::where('idgrupos',$idgrupos)->get();
                  
                   foreach ($rows as $row) {
                      nota::create([
                        'nota'=> 0,
                        'idestudiantegrupos'=>$message->id,
                        'idponderacions'=>$row->id,
                        ]);  
                             
                   }////fin foreach
                }////fin foreach

                DB::commit();
                
                return Response::json([
                'bandera'=>1,
                'response'=>'Ponderacion asignada exitosamente',
                ]); 
            }////fin else count messages
            DB::rollback();

               
        } catch (\Throwable $e) {
          DB::rollback();
          return Response::json([
                'bandera'=>0,
                'response'=>'eroor',
                ]); 
         
       }////fin catch

           
        }else{
           return Response::json([
            'bandera'=>0,
            'response'=>'Ya se registro Ponderacion a este grupo',
            ]);  
        }



    }////fin createPonderacion


}
