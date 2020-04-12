<?php

namespace App\Http\Controllers;

use App\Evaluaciones;
use App\EvaluacionesPonderaciones;

use Illuminate\Http\Request;

class EvaluacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluaciones = Evaluaciones::all();
        return view("ponderaciones.index", compact('evaluaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ponderaciones.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->get('items');
        $evaluacion = new Evaluaciones;
        $evaluacion->titulo = $request->get('nombre');
        $evaluacion->save();

        foreach ($items as $key => $value) {
            $item = new EvaluacionesPonderaciones;
            $item->titulo = $value['nombre'];
            $item->ponderacion = $value['ponderacion'];
            $item->evalucion_id = $evaluacion->id;
            $item->save();
        }

        return array(
            "ok" => true
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $evaluacion = Evaluaciones::find($id);
      return view("ponderaciones.edit", compact("evaluacion"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $params = $request->all();
      $evaluacion = Evaluaciones::find($id);
      $evaluacion->titulo = $request->get('nombre');
      $evaluacion->save();
      
      $rowDelete = EvaluacionesPonderaciones::where('evalucion_id', $id)->delete();

      foreach ($request->get('items') as $key => $value) {
        $item = new EvaluacionesPonderaciones;
        $item->titulo = $value['titulo'];
        $item->ponderacion = $value['ponderacion'];
        $item->evalucion_id = $id;
        $item->save();
      }

      return array(
        "ok" => true
      );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
