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
use App\nota;

use App\estudiante;
use App\estudiantegrupo;
use App\user;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;


class userNotasEstudianteController extends Controller
{
 public function show(){
        $usuarioActual=\Auth::user();
         $userEstudiante=estudiante::where('idusers',$usuarioActual->id)->get()->first();
         $IDESTUDIANTE=$userEstudiante->id;
   //return Response::json($userEstudiante);
//return Response::json($usuarioActual);


        $idiomas=estudiantegrupo:://DB::table('estudiantegrupos')//es esdudiante grupo tabla
         join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.ididiomas')
         ->distinct()
         ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)
         ->get();

           // return Response::json($idiomas);
         $cursos=estudiantegrupo:://DB::table('estudiantegrupos')
         join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.idcursos')
         ->distinct()
         ->where('nivels.ididiomas',$idiomas->first()->ididiomas)
        ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)///////////////////////////////////////////////////////////
         ->get();         
       //return Response::json($cursos);
         //$collection=''; 
         
         foreach ($idiomas as $idioma) {
            $message=idioma::find($idioma->ididiomas);
              $arrayIdiomas[] = (object) array(
                'ididiomas' =>$idioma->ididiomas,
                'nombre' =>$message->nombre,
                
                 );
         }

         foreach ($cursos as $curso) {
            $message2=DB::table('cursos')
         ->join('modalidads', 'cursos.idmodalidads', '=', 'modalidads.id')
         ->select('modalidads.nombre','modalidads.turno')
         ->where('cursos.id',$curso->idcursos)
         ->first();
            $arrayCursos[] = (object) array(
                'nombre' =>$message2->nombre,
                'turno' =>$message2->turno,
                'idcursos'=>$curso->idcursos,
                 );

             
         }
         //return Response::json(collect($arrayCursos));
         //return Response::json($message2);
         
             // $collection=collect($arrayIdiomas);
          if (count($cursos)>1) {
             $categorias=DB::table('estudiantegrupos')
             ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
             ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
             ->select('nivels.idcategorias')
             ->distinct()
             ->where('nivels.ididiomas',$idiomas->first()->ididiomas)      
             ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)/////////////////////////////////////////
            //->where('nivels.idcursos',$cursos->first()->idcursos)   
            ->orderBy('nivels.idcategorias','ASC')//->orderBy('nivels.numNivel','ASC') me daba error en herou por postgress
            ->get(); 
          }else{
              $categorias=DB::table('estudiantegrupos')
             ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
             ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
             ->select('nivels.idcategorias')
             ->distinct()
             ->where('nivels.ididiomas',$idiomas->first()->ididiomas)      
             ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)/////////////////////////////////////////
             ->where('nivels.idcursos',$cursos->first()->idcursos)   
             ->orderBy('nivels.idcategorias','ASC')//->orderBy('nivels.numNivel','ASC') me daba error en herou por postgress
             ->get(); 
            }
         //return Response::json($categorias);
         $llenarInfo='';
         foreach ($categorias as $categoria) {
            $message=categoria::find($categoria->idcategorias);
             $llenarInfo.=' <a  href="" style="padding: 5px;font-size: 17px" class="media-heading box-inline text-lg text-main ">
                              <div class="label bg-dark " data-container="body">'.$message->nombre.'</div>
                            </a>';

                if (count($cursos)>1) {
                    $messages=DB::table('estudiantegrupos')
                     ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
                     ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
                     ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')     
                     ->select('nivels.numNivel','periodos.fechaIni','periodos.fechaFin','periodos.anho','estudiantegrupos.notaFinal','grupos.iddocentes','grupos.numGrupo','nivels.idcursos','estudiantegrupos.id','estudiantegrupos.estado as estadoEst')
                     ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)//add Auh User
                 //  ->where('nivels.idcursos',$cursos->first()->idcursos)
                     ->where('nivels.idcategorias',$categoria->idcategorias)
                     ->where('nivels.ididiomas',$idiomas->first()->ididiomas)
                     ->orderBy('nivels.numNivel','ASC')
                     ->orderBy('periodos.fechaIni','ASC')
                     ->get();    
    
                }else{
                    $messages=DB::table('estudiantegrupos')
                     ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
                     ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
                     ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')  
                     ->select('nivels.numNivel','periodos.fechaIni','periodos.fechaFin','periodos.anho','estudiantegrupos.notaFinal','grupos.iddocentes','grupos.numGrupo','nivels.idcursos','estudiantegrupos.id','estudiantegrupos.estado as estadoEst')
                     ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)//add Auh User
                     ->where('nivels.idcursos',$cursos->first()->idcursos)
                     ->where('nivels.idcategorias',$categoria->idcategorias)
                     ->where('nivels.ididiomas',$idiomas->first()->ididiomas)
                     ->orderBy('nivels.numNivel','ASC')
                     ->orderBy('periodos.fechaIni','ASC')
                     ->get();    
                }
        // return Response::json($messages);
         
          

                /* $llenarInfo.='<div class="table table-responsive">
                                    <table class="table table-striped table-bordered row-border dataTable no-footer">
                                        
                                        <th>Nivel</th>
                                        <th>Sección</th>
                                        <th>Docente</th>';                                        
                if (count($cursos)>1) {
                    $llenarInfo.='<th>Curso</th>';
                }

                $llenarInfo.='<th>Estado</th>
                                <th>Año</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Promedio</th>';


                             $llenarInfo.='<tbody>';
*/
                  $seccion = array('1' =>'A' ,
                            '2' =>'B' ,
                            '3' =>'C' ,
                            '4' =>'D' ,
                            '5' =>'E' ,
                            '6' =>'F' ,
                            
                         );

                  ////////////////////////////////////////////////////////////////////////////////////////
                  $llenarInfo.='<div class="table table-responsive">
                                    <table class="table table-striped table-bordered row-border dataTable no-footer">
                                        
                                        <th>Nivel</th>
                                       
                                        <th>Periodo</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>Nota Final</th>';
                    $llenarInfo.='<tbody>';                    
                   
                  foreach ($messages as $message) {
                    if ($message->estadoEst=="PREINSCRITO") {
                        
                    }else{
                            $llenarInfo.='<tr>';
                            $llenarInfo.='<td rowspan="2">Nivel '.$message->numNivel.' '.$seccion[$message->numGrupo].' </td>';

//                            $llenarInfo.='<td align="center" rowspan="2">'.$seccion[$message->numGrupo].' </td>';
                            $llenarInfo.='<td align="center" rowspan="2">'.$message->fechaIni.' - '.$message->fechaFin.' </td>';

                            //$nota=nota::where('idestudiantegrupos',7)->get();
                            $notas=DB::table('notas')
                             ->join('ponderacions', 'notas.idponderacions', '=', 'ponderacions.id')
                             ->select('notas.*','ponderacions.ponderacion')
                             ->where('notas.idestudiantegrupos',$message->id)
                             ->get();
                           // return Response::json($nota); 
                             $cont=0;
                             foreach ($notas as $nota) {
                                if($nota==""){
                                    //$llenarInfo.='<td>Nivel  </td>';
                                }
                                $llenarInfo.='<td style="font-weight:bold">'.number_format($nota->ponderacion,2).'% </td>';

                                $cont++;
                            }   
                            for ($c=$cont; $c<8 ; $c++) { 
                                    $llenarInfo.='<td>--</td>';    
                             }
                             $llenarInfo.='<td></td>';                   
                 
                            
                             
                             
                             $llenarInfo.='</tr>';
                             $llenarInfo.='<tr>';
                             
                             foreach ($notas as $nota) {
                                if($nota==""){
                                    //$llenarInfo.='<td>Nivel  </td>';
                                }
                                if($nota->nota==0){
                                     $llenarInfo.='<td>--</td>';
                                }else
                                $llenarInfo.='<td>'.$nota->nota.' </td>';
                            }
                            for ($c=$cont; $c<8 ; $c++) { 
                                    $llenarInfo.='<td>--</td>';    
                             }
                            $llenarInfo.='<td> '.$message->notaFinal.' </td>';
                             $llenarInfo.='</tr>';
                      }

                 }
                 //for ($c=$cont; $c<=8 ; $c++) { 
                   //         $llenarInfo.='<td>--</td>';    
                     //}                   

                 /////////////////////////////////////////////////////////////////////////////////////////////
                /* foreach ($messages as $message) {
                    $llenarInfo.='<tr>';
                    //$llenarInfo.='<td>1</td>';
                    $llenarInfo.='<td>Nivel '.$message->numNivel.' </td>';

                    $llenarInfo.='<td align="center">'.$seccion[$message->numGrupo].' </td>';

                    if ($message->iddocentes==null) {
                        $llenarInfo.='<td>No Asgnado Aun</td>';
                        
                    }else{
                        $docente=docente::find($message->iddocentes);    
                        $llenarInfo.='<td>'.$docente->nombre.' '.$docente->apellido.'</td>';
                    
                    }
                    if (count($cursos)>1) {
                         $llenarInfo.='<td>'.collect($arrayCursos)->where('idcursos',$message->idcursos)->first()->nombre.'
                         '.collect($arrayCursos)->where('idcursos',$message->idcursos)->first()->turno.'
                         </td>';
                    }
                    $llenarInfo.='<td>APROBADO</td>';
                    $llenarInfo.='<td align="center">'.$message->anho.'</td>';
                    $llenarInfo.='<td align="center">'.$message->fechaIni.'</td>';
                    $llenarInfo.='<td align="center">'.$message->fechaFin.'</td>';
                    $llenarInfo.='<td align="center">'.$message->notaFinal.'</td>';
                    $llenarInfo.='</tr>';
                                 
                    }     */

                    $llenarInfo.='</tbody>
                             </table>
                         </div>';          

         }///fin foreach categorias

        // return Response::json($llenarInfo);
         
          
        
        return view('userEstudiante.notasEstudiante',[
                 'actualIdioma' => $idiomas->first()->ididiomas,
                 'nombreIdioma'=>collect($arrayIdiomas)->where('ididiomas',$idiomas->first()->ididiomas)->first()->nombre,
                 'idiomas' => collect($arrayIdiomas),///se debe mandar collect por que sino no sirve de ninguna manera
                 'actualCurso' => $cursos->first()->idcursos,
                 'cantidadCurso' => count($cursos),
                 'cursos' => collect($arrayCursos), //debido a que blade forelse se comunica con collection de laravels
                 'llenarInfo'=>$llenarInfo,
                 'usuarioActual'=>$usuarioActual,
                 'datosEstudiante'=>$userEstudiante,
                ]);
         
    }
}
