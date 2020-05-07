<?php

namespace App\Http\Controllers;

use App\nivel;
use App\idioma;
use App\categoria;

use App\Configuraciones;
use App\MaterialDidactico;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

class MaterialDidacticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return Response::json(count(Configuraciones::get()));
        $materiales = MaterialDidactico::all();
        if(count(Configuraciones::get())== 0 ){
            Configuraciones::create([
                'extra'=> 0,
                'valor'=> 'Equipos',
                'cantidad'=> 5,
            
            ]);
            Configuraciones::create([
                'extra'=> 0,
                'valor'=> 'Materiales',
                'cantidad'=> 23,
            ]); 
           
        }
        
   /*     INSERT INTO `configuraciones` (`id`, `extra`, `valor`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 0, 'Equipos', 5, '2019-10-12 01:00:00', '2019-12-28 02:52:24'),
(2, 0, 'Materiales', 23, '2019-10-21 01:00:00', '2019-11-19 00:08:59');
     */   
       
   
        return view("materiales.index", compact(
            "materiales"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idiomas = idioma::all();
        $categorias = categoria::all();
        return view("materiales.create", compact("idiomas", "categorias") );
    }

    private function generateCodigoEquipo($valor) {
        $inicio = "MD";
        $complemento = "00".$valor;

        if($valor > 9)
            $complemento = "0".$valor;
        else if($valor > 99)
            $complemento = $valor;
        return "$inicio$complemento";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = Configuraciones::find(2);
        $copia  = $request->get('copia');
        $donado = $request->get('donado');
        $item = new MaterialDidactico();

        $item->estado = 1;
        $item->titulo = $request->get('titulo');
        $item->nivel_id = $request->get('nivel');
        $item->idioma_id = $request->get('idioma');
        $item->editorial = $request->get('editorial');
        $item->categoria_id = $request->get('categoria');
        $item->observaciones = $request->get('observacion');
        $item->codigo = $this->generateCodigoEquipo($config->cantidad);
        $item->fechaAd = date('Y-m-d', strtotime($request->get('fechaAdd')));

        $item->is_donado  = ($donado === 'true');
        $item->is_cd = !is_null($request->get('cd'));
        $item->tipo_material = ($copia === 'true') ? 2 : 1;
        $item->costo =   ($donado === 'true')  ?  0.0  : $request->get('costo');
        $item->autor =   ($donado === 'true' || $copia === 'true' ) ? 'N/A' : $request->get('autor');
        $item->edicion = ($donado === 'true' || $copia === 'true' ) ? 'N/A' : $request->get('edicion');

        $config->cantidad += 1;
        $config->save();

        if($item->save()) {
            return json_encode([
                "ok" => true,
                "message"  => "Se agrego con exito el nuevo material"
            ]);
        }

        return json_encode([
            "ok" => false,
            "message"  => "Tenemos un problema por el momento, intentalo mas tarde"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialDidactico  $materialDidactico
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialDidactico $materialDidactico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialDidactico  $materialDidactico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idiomas = idioma::all();
        $categorias = categoria::all();
        $material = $this->format(MaterialDidactico::find($id));

        return view('materiales.edit', compact('material', 'idiomas', 'categorias'));
    }

    public function format(MaterialDidactico $m)
    {
        $m->nivel_id     = "{$m->nivel_id}";
        $m->idioma_id    = "{$m->idioma_id}";
        $m->categoria_id = "{$m->categoria_id}";
        $m->copia        = ($m->tipo_material == 2);

        return $m;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialDidactico  $materialDidactico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialDidactico $materialDidactico)
    {
        $copia  = $request->get('copia');
        $donado = $request->get('donado');
        $item = MaterialDidactico::find($request->get('id'));

        $item->titulo = $request->get('titulo');
        $item->nivel_id = $request->get('nivel_id');
        $item->idioma_id = $request->get('idioma_id');
        $item->editorial = $request->get('editorial');
        $item->categoria_id = $request->get('categoria_id');
        $item->observaciones = $request->get('observaciones');
        // $item->fechaAd = date('Y-m-d', strtotime($request->get('fechaAd')));

        $item->is_donado  = ($donado === 'true');
        $item->is_cd = !is_null($request->get('cd'));
        $item->tipo_material = ($copia === 'true') ? 2 : 1;
        $item->costo =   ($donado === 'true')  ?  0.0  : $request->get('costo');
        $item->autor =   ($donado === 'true' || $copia === 'true' ) ? 'N/A' : $request->get('autor');
        $item->edicion = ($donado === 'true' || $copia === 'true' ) ? 'N/A' : $request->get('edicion');

        if($item->save()) {
            return json_encode([
                "ok" => true,
                "message"  => "Se actualizo con exito al material"
            ]);
        }

        return json_encode([
            "ok" => false,
            "message"  => "Tenemos un problema por el momento, intentalo mas tarde"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialDidactico  $materialDidactico
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialDidactico $materialDidactico)
    {
        //
    }
}
