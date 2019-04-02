<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\periodo;

use Illuminate\Support\Facades\Response;

class periodoController extends Controller
{
    //
     public function show(){
       $year=date("Y");
//return Response::json($year);
     	$periodos=periodo::where('año',$year)->where('nombre','10')->get();
          $años=periodo::distinct()->get(['año']);
          //$periodos=periodo::where('nombre',10)->where('año',)->get();


        	  return view('periodos.showPeriodo',[
            	 'periodos' => $periodos,
               'anhos' => $años,
               'selectYear'=>$year,
               'selectPeriodo'=>10,
        	//'noticias'=> $noticias,
            	]);
      }
     public function create(Request $request){//createBeneficiariosRequest $request){
$contperiodo=count(periodo::where('nombre',$request->input('nperiodo'))->where('año',$request->input('año'))->get());

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
      'año'=> $request->input('año'),
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
      $message=periodo::where('año',$anho)->where('nombre',$nperiodofiltro)->get();
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
}
