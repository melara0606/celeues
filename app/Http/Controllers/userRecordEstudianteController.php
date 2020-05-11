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


class userRecordEstudianteController extends Controller
{
    //
    public function show(){
        $usuarioActual=\Auth::user();
         $userEstudiante=estudiante::where('idusers',$usuarioActual->id)->get()->first();
         $IDESTUDIANTE=$userEstudiante->id;
   //return Response::json($userEstudiante);


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
     //  return Response::json($cursos);
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
             ->orderBy('nivels.numNivel','ASC')
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
             ->orderBy('nivels.numNivel','ASC')
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
         
          

                 $llenarInfo.='<div class="table table-responsive">
                                    <table class="table table-striped table-bordered row-border dataTable no-footer">
                                        
                                        <th>Nivel</th>
                                        <th>Sección</th>
                                        <th>Docente</th>';                                        
                if (count($cursos)>1) {
                //    $llenarInfo.='<th>Curso</th>';
                }
                //<th>Año</th>
                $llenarInfo.='<th>Estado</th>
                                
                                <th>Periodo</th>
                                <th>Horario</th>
                                
                                <th>Promedio</th>';


                             $llenarInfo.='<tbody>';
/**/
                  $seccion = array('1' =>'A' ,
                            '2' =>'B' ,
                            '3' =>'C' ,
                            '4' =>'D' ,
                            '5' =>'E' ,
                            '6' =>'F' ,
                            
                         );

                  ////////////////////////////////////////////////////////////////////////////////////////
                  
                 /////////////////////////////////////////////////////////////////////////////////////////////
                 foreach ($messages as $message) {
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
                        // $llenarInfo.='<td>'.collect($arrayCursos)->where('idcursos',$message->idcursos)->first()->nombre.'
                        // '.collect($arrayCursos)->where('idcursos',$message->idcursos)->first()->turno.'
                        // </td>';
                    }
                    $llenarInfo.='<td>APROBADO</td>';
                    //$llenarInfo.='<td align="center">'.$message->anho.'</td>';
                    $llenarInfo.='<td align="center">'.$message->fechaIni.'-'.$message->fechaFin.' </td>';
                   // $llenarInfo.='<td align="center">'.$message->fechaFin.'</td>';
                     $horariocurso=DB::table('horariocursos')
                     ->join('dias', 'horariocursos.iddias', '=', 'dias.id')
                     ->select('horariocursos.horaInicio','horariocursos.horaFin','dias.*')
                     ->where('horariocursos.idcursos',$message->idcursos)//add Auh User
                     ->get();
                     if($horariocurso->first()->contractado != $horariocurso->last()->contractado) { 
                     $llenarInfo.='<td align="center">'.$horariocurso->first()->contractado.' '.$horariocurso->last()->contractado.'</td>';
                    }
                    else{
                     $llenarInfo.='<td align="center">'.$horariocurso->first()->contractado.' '.$horariocurso->first()->horaInicio.'-'.$horariocurso->first()->horaFin.' </td>';

                    }

                    $llenarInfo.='<td align="center">'.$message->notaFinal.'</td>';
                    $llenarInfo.='</tr>';
                                 
                    }   /*  */

                    $llenarInfo.='</tbody>
                             </table>
                         </div>';          

         }///fin foreach categorias

        // return Response::json($llenarInfo);
         
          
        
        return view('userEstudiante.recordEstudiante',[
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
    public function showParametros($ParametroId){
          $usuarioActual=\Auth::user();
         $userEstudiante=estudiante::where('idusers',$usuarioActual->id)->get()->first();
        $IDESTUDIANTE=$userEstudiante->id;
        $idiomas=DB::table('estudiantegrupos')
         ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.ididiomas')
         ->distinct()
         ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)///authUser
         ->get();

          //  return Response::json($message->first()->ididiomas);
         $cursos=DB::table('estudiantegrupos')
         ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.idcursos')
         ->distinct()
         ->where('nivels.ididiomas',$ParametroId)
          ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)///////////////////////////////////////////////////////////
         ->get();         
        // return Response::json($message2);
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
          
          $categorias=DB::table('estudiantegrupos')
         ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.idcategorias')
         ->distinct()
         ->where('nivels.ididiomas',$ParametroId)
         ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)/////////////////////////////////////////
         ->where('nivels.idcursos',$cursos->first()->idcursos)   
        
         ->orderBy('nivels.numNivel','ASC')
         ->get(); 
        
         //return Response::json($categorias);
         $llenarInfo='';
         foreach ($categorias as $categoria) {
            $message=categoria::find($categoria->idcategorias);
             $llenarInfo.=' <a  href="" style="padding: 5px;font-size: 17px" class="media-heading box-inline text-lg text-main ">
                              <div class="label bg-dark " data-container="body">'.$message->nombre.'</div>
                            </a>';

              $messages=DB::table('estudiantegrupos')
                 ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
                 ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
                 ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
                 
                 ->select('nivels.numNivel','periodos.fechaIni','periodos.fechaFin','periodos.anho','estudiantegrupos.notaFinal','grupos.iddocentes','grupos.numGrupo')
                  ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)/////////////////////////////////////////
                  ->where('nivels.idcursos',$cursos->first()->idcursos)   
        
                 ->where('nivels.idcategorias',$categoria->idcategorias)
                 ->where('nivels.ididiomas',$ParametroId)
                 ->orderBy('nivels.numNivel','ASC')
                 ->orderBy('periodos.fechaIni','ASC')
                 ->get();    

         //return Response::json($messages);
         
          

                 $llenarInfo.='<div class="table table-responsive">
                                    <table class="table table-striped table-bordered row-border dataTable no-footer">
                                        <th>#</th>
                                        <th>Nivel</th>
                                        <th>Sección</th>
                                        <th>Docente</th>                                        
                                        <th>Estado</th>
                                        <th>Año</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Promedio</th>
                                    <tbody>
                                    ';
                  $seccion = array('1' =>'A' ,
                            '2' =>'B' ,
                            '3' =>'C' ,
                            '4' =>'D' ,
                            '5' =>'E' ,
                            '6' =>'F' ,
                            
                         );       
                                      
                 foreach ($messages as $message) {
                    $llenarInfo.='<tr>';
                    $llenarInfo.='<td>1</td>';
                    $llenarInfo.='<td>Nivel '.$message->numNivel.'</td>';
                    $llenarInfo.='<td align="center">'.$seccion[$message->numGrupo].'</td>';
                   
                    if ($message->iddocentes==null) {
                        $llenarInfo.='<td>No Asgnado Aun</td>';
                        
                    }else{
                        $docente=docente::find($message->iddocentes);    
                        $llenarInfo.='<td>'.$docente->nombre.' '.$docente->apellido.'</td>';
                    
                    }
                    $llenarInfo.='<td>aprovado</td>';
                    $llenarInfo.='<td align="center">'.$message->anho.'</td>';
                    $llenarInfo.='<td align="center">'.$message->fechaIni.'</td>';
                    $llenarInfo.='<td align="center">'.$message->fechaFin.'</td>';
                    $llenarInfo.='<td align="center">'.$message->notaFinal.'</td>';
                    $llenarInfo.='</tr>';
                                 
                    }     

                    $llenarInfo.='</tbody>
                             </table>
                         </div>';          

         }///fin foreach categorias

         //return Response::json($llenarInfo);
         
          
        
        return view('userEstudiante.recordEstudiante',[
                 'actualIdioma' => $ParametroId,
                 'idiomas' => collect($arrayIdiomas),///se debe mandar collect por que sino no sirve de ninguna manera
                  'nombreIdioma'=>collect($arrayIdiomas)->where('ididiomas',$idiomas->first()->ididiomas)->first()->nombre,
                
                 'actualCurso' => $cursos->first()->idcursos,
                 'cantidadCurso' => count($cursos),
                 'cursos' => collect($arrayCursos), //debido a que blade forelse se comunica con collection de laravels
                 'llenarInfo'=>$llenarInfo,
                 'usuarioActual'=>$usuarioActual,
                 'datosEstudiante'=>$userEstudiante,

                    
                ]);
         
         
    }///fin showParametros

       public function filtrar(Request $request){
        $IDCURSO=$request->input('IDCURSO');
        $IDIDIOMA=$request->input('IDIDIOMA');


    	 $usuarioActual=\Auth::user();
         $userEstudiante=estudiante::where('idusers',$usuarioActual->id)->get()->first();
        $IDESTUDIANTE=$userEstudiante->id;
        $idiomas=DB::table('estudiantegrupos')
         ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.ididiomas')
         ->distinct()
         ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)///authUser
         ->get();

          //  return Response::json($message->first()->ididiomas);
         $cursos=DB::table('estudiantegrupos')
         ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.idcursos')
         ->distinct()
         ->where('nivels.ididiomas',$IDIDIOMA)
          ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)///////////////////////////////////////////////////////////
         ->get();         
        // return Response::json($message2);
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
          
          $categorias=DB::table('estudiantegrupos')
         ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
         ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
         ->select('nivels.idcategorias')
         ->distinct()
         ->where('nivels.ididiomas',$IDIDIOMA)
         ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)/////////////////////////////////////////
         ->where('nivels.idcursos',$IDCURSO)   
        
         ->orderBy('nivels.numNivel','ASC')
         ->get(); 
        
         //return Response::json($categorias);
         $llenarInfo='';
         foreach ($categorias as $categoria) {
            $message=categoria::find($categoria->idcategorias);
             $llenarInfo.=' <a  href="" style="padding: 5px;font-size: 17px" class="media-heading box-inline text-lg text-main ">
                              <div class="label bg-dark " data-container="body">'.$message->nombre.'</div>
                            </a>';

              $messages=DB::table('estudiantegrupos')
                 ->join('grupos', 'estudiantegrupos.idgrupos', '=', 'grupos.id')
                 ->join('nivels', 'grupos.idnivels', '=', 'nivels.id')
                 ->join('periodos', 'grupos.idperiodos', '=', 'periodos.id')
                 
                 ->select('nivels.numNivel','periodos.fechaIni','periodos.fechaFin','periodos.anho','estudiantegrupos.notaFinal','grupos.iddocentes','grupos.numGrupo')
                  ->where('estudiantegrupos.idestudiantes',$IDESTUDIANTE)/////////////////////////////////////////
                  ->where('nivels.idcursos',$IDCURSO)   
        
                 ->where('nivels.idcategorias',$categoria->idcategorias)
                 ->where('nivels.ididiomas',$IDIDIOMA)
                 ->orderBy('nivels.numNivel','ASC')
                 ->orderBy('periodos.fechaIni','ASC')
                 ->get();    

         //return Response::json($messages);
         
          

                 $llenarInfo.='<div class="table table-responsive">
                                    <table class="table table-striped table-bordered row-border dataTable no-footer">
                                        
                                        <th>Nivel</th>
                                        <th>Sección</th>
                                        <th>Docente</th>                                        
                                        <th>Estado</th>
                                        <th>Año</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Promedio</th>
                                    <tbody>
                                    ';
                  $seccion = array('1' =>'A' ,
                            '2' =>'B' ,
                            '3' =>'C' ,
                            '4' =>'D' ,
                            '5' =>'E' ,
                            '6' =>'F' ,
                            
                         );       
                                      
                 foreach ($messages as $message) {
                    $llenarInfo.='<tr>';
                    //$llenarInfo.='<td>1</td>';
                    $llenarInfo.='<td>Nivel '.$message->numNivel.'</td>';
                    $llenarInfo.='<td align="center">'.$seccion[$message->numGrupo].'</td>';
                   
                    if ($message->iddocentes==null) {
                        $llenarInfo.='<td>No Asgnado Aun</td>';
                        
                    }else{
                        $docente=docente::find($message->iddocentes);    
                        $llenarInfo.='<td>'.$docente->nombre.' '.$docente->apellido.'</td>';
                    
                    }
                    $llenarInfo.='<td>aprovado</td>';
                    $llenarInfo.='<td align="center">'.$message->anho.'</td>';
                    $llenarInfo.='<td align="center">'.$message->fechaIni.'</td>';
                    $llenarInfo.='<td align="center">'.$message->fechaFin.'</td>';
                    $llenarInfo.='<td align="center">'.$message->notaFinal.'</td>';
                    $llenarInfo.='</tr>';
                                 
                    }     

                    $llenarInfo.='</tbody>
                             </table>
                         </div>';          

         }///fin foreach categorias

         return Response::json($llenarInfo);
         
          
        
        return view('userEstudiante.recordEstudiante',[
                 //'actualIdioma' => $IDIDIOMA,
                // 'idiomas' => collect($arrayIdiomas),///se debe mandar collect por que sino no sirve de ninguna manera
                 //'actualCurso' => $IDCURSO,
                 //'cursos' => collect($arrayCursos), //debido a que blade forelse se comunica con collection de laravels
                 'llenarInfo'=>$llenarInfo,
                 //'usuarioActual'=>$usuarioActual,
                 //'datosEstudiante'=>$userEstudiante,

                    
                ]);
    }//fin filtrar
}
