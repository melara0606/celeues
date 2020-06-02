<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\estudiante;

use App\grupo;
use App\estudiantegrupo;

use App\cursocategoria;
use App\ponderacion;
use App\nota;
use App\user;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
class notaController extends Controller
{
    public function show($idgrupos){

         $usuarioActual=\Auth::user();

       	//$estudiante=estudiante::latest()->get(); 
        $estudiantegrupos=DB::table('estudiantegrupos')
        ->join('estudiantes', 'estudiantegrupos.idestudiantes', '=', 'estudiantes.id')
        ->select('estudiantes.*','estudiantegrupos.estado as estadoEstudiante','estudiantegrupos.id as idestudiantegrupo')
        ->where('estudiantegrupos.idgrupos',$idgrupos)
        ->where('estudiantegrupos.estado','ACTIVO')
        ->orderBY('estudiantes.nombre')
        ->get();

        $tbody='';
        $x=0.00;
        $y=0.00;
         //for($i=1;$i<15;$i++){}
          foreach ($estudiantegrupos as $estudiantegrupo) {
          	$tbody.='<tr>';
          	 $y=$y+1;
	          	$tbody.='<td>'.$y.'</td>';
          	//$estudiante=estudiante::where('id',$estudiantegrupo->id)->get(['id','nombre','apellido']);
	         $users=user::find($estudiantegrupo->idusers);
	         $tbody.='<td><div class="comment-header">'.
                '<label class="media-heading box-inline text-main text-sm text-semibold ">'.$estudiantegrupo->nombre.' '.$estudiantegrupo->apellido.'</label>'. 
               // '<p class="text-muted text-xs">'.$users->name.'</p>'.
            '</div></td>';
          	//$tbody.='<td>'.$estudiantegrupo->nombre.' '.$estudiantegrupo->apellido.'</td>';
	       
         		$estudiantesNotas=DB::table('notas')
	          ->join('ponderacions', 'notas.idponderacions', '=', 'ponderacions.id')
	          ->select('notas.*','ponderacions.ponderacion','ponderacions.correlativo')
	          ->where('notas.idestudiantegrupos',$estudiantegrupo->idestudiantegrupo)
	          ->get();
	          //return Response::json($estudiantesNotas);
	          $x=0.00;

            $grupo=grupo::find($idgrupos);

            //return Response::json($grupo->periodos);
			
			$readonly="";
            if($grupo->periodos->estado=="ACTIVO"){
               if($grupo->estado=="FINALIZADO" && $usuarioActual->tipo=="DOCENTE"){///AND USER TIPO DOCENTE
				  $readonly="readonly";
                }else if($grupo->estado=="FINALIZADO" && $usuarioActual->tipo=="ADMIN"){///AND USER TIPO ADMIN
					$readonly="";
				}
            }else{
				if($grupo->estado=="FINALIZADO" && $usuarioActual->tipo=="DOCENTE"){///AND USER TIPO DOCENTE
					$readonly="readonly";
				}else if($grupo->estado=="FINALIZADO" && $usuarioActual->tipo=="ADMIN"){///AND USER TIPO ADMIN
					$readonly="readonly";
				}
            }
	         
            foreach ($estudiantesNotas as $estudiantesNota) {
                $x=$x+($estudiantesNota->nota*($estudiantesNota->ponderacion)/100);

                if ($estudiantesNota->nota==0) {
    	          		//style="background-color:#FBFBFB"
                   $tbody.='<td align="center"><div class="form-group" id="divet'.$estudiantegrupo->idestudiantegrupo.'pn'.$estudiantesNota->correlativo.'" ><input type="number" data-idestudiantegrupos="'.$estudiantegrupo->idestudiantegrupo.'" data-idnotas="'.$estudiantesNota->id.'" style="width:70px;height:25px" max="10" min="1" class="form-control input-sm bord-btm has-success enter" name="" id="et'.$estudiantegrupo->idestudiantegrupo.'pn'.$estudiantesNota->correlativo.'" value="" '.$readonly.'></div></td>';

               }else{
                   $tbody.='<td  align="center"><div class="form-group" id="divet'.$estudiantegrupo->idestudiantegrupo.'pn'.$estudiantesNota->correlativo.'" ><input type="number" data-idestudiantegrupos="'.$estudiantegrupo->idestudiantegrupo.'" data-idnotas="'.$estudiantesNota->id.'" style="width:70px;height:25px;box-shadow: 0 1px 1px rgba(1, 1, 1, 0) inset, 0 0 1px rgba(1, 1, 1, 1);" max="10" min="1" class="form-control input-sm bord-btm enter" name="" id="et'.$estudiantegrupo->idestudiantegrupo.'pn'.$estudiantesNota->correlativo.'" value="'.$estudiantesNota->nota.'" '.$readonly.'></div></td>';
               }
	          	
	          }///finforeach
			 $tbody.='<td align="center"><div class="form-group has-success" id="divetf'.$estudiantegrupo->idestudiantegrupo.'" ><input type="number"  data-idestudiantegrupos="'.$estudiantegrupo->idestudiantegrupo.'" style="width:70px;height:25px" max="10" min="1" class="form-control input-sm bord-btm enter" name="" id="etf'.$estudiantegrupo->idestudiantegrupo.'" value="'.number_format($x,2).'" readonly="true"></div></td>';
/*
			$tbody.='<td align="center"><div width="80px" class="panel media pad-all bg-info">
					                   
					                    <div class="media-body">
					                        <p class="text-2x mar-no text-semibold">543</p>
					                      
					                    </div>
					               </td> </div>';
*/	          	
			
          $tbody.='</tr>';
          }///fin foreach
         
  			//return Response::json($estudiantegrupos);

            ///////////cantdiad de notas
            $notas=ponderacion::where('idgrupos',$idgrupos)->get();
            $thead='';
            $thead.='<tr>';
            $thead.='<th>#</th>';

            $thead.='<th>Estudent Name</th>';
            foreach ($notas as $nota) {
              $thead.='<th style="text-align:center;">'.$nota->nombreEvaluacion.' ('.$nota->ponderacion.'%)</th>';
            }
            $thead.='<th>Final Note</th>';
            $thead.='</tr>';


       	$estudiante=estudiante::latest()->get(); ///quitar luego
         return view('notas.showNotas',[

          'tbody'=>$tbody,

          'thead'=>$thead,
          'selectGrupo' => $idgrupos, 
          'estudiantegrupos' => $estudiantegrupos,
              	  'estudiantes' => $estudiante, ///quitar luego
              	]);
      }///fin Show



      public function createNota(Request $request){
      	$nota=$request->input('nota');
      	$idestudiantegrupos=$request->input('idestudiantegrupos');
      	$idnotas=$request->input('idnotas');

      	if($nota>10 || $nota<0){
      		 return Response::json([
  			    'bandera'=>0,
  			    'response'=>'Nota debe estar en el rango de 0 a 10',
  			 ]);
      	
      	}
      	DB::beginTransaction();
        try{

		      	$message=nota::find($idnotas);
		      	
		        $message->fill([
				      'nota'=> $nota,
				      ]);
		         if($message->save()){
		         	$estudiantesNotas=DB::table('notas')
			          ->join('ponderacions', 'notas.idponderacions', '=', 'ponderacions.id')
			          ->select('notas.*','ponderacions.ponderacion','ponderacions.correlativo')
			          ->where('notas.idestudiantegrupos',$idestudiantegrupos)
			          ->get();
					      $x=0.00;
					      foreach ($estudiantesNotas as $estudiantesNota) {
					       	$x=$x+($estudiantesNota->nota*($estudiantesNota->ponderacion)/100);
					      }     

					     $message2=estudiantegrupo::find($idestudiantegrupos);
					     $message2->fill([
						      'notaFinal'=> number_format($x,2),//round($x,2),
						      ]);
				         if($message2->save()){

				         	 DB::commit();
				         	 return Response::json([
				  			    'bandera'=>1,
				  			    'notaFinal'=>number_format($x,2),
				  			 ]);
				         }
				         DB::rollback();



		         	 return Response::json([
		  			    'bandera'=>0,
		  			    'response'=>'No guardo nada',
		  			 ]);
		         }///fin if save
        } catch (\Throwable $e) {
          DB::rollback();
          return Response::json([
                'bandera'=>0,
                'response'=>'error',
                ]); 
         
       }////fin catch

         


      /*$message=estudiantegrupo::find($idestudiantegrupos);
      	$message->fill([
              'notaFinal'=>0.0,
              ]);
               if($message->save()){
           		}*/


      }//fin createNota

}
