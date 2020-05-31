<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\TipoEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Prestamo;
use App\PrestamoItem;
use App\PrestamoDetalle;


class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::all();
        return view('prestamos.index', [
            "records" => $prestamos
        ]);
    }

    public function create()
    {
        $tipos = TipoEquipo::all();
        return view('prestamos.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $all = $request->all();
        $prestamo = Prestamo::create([
            "docente_id" => 33,
            "estado"     => 1,
            "observaciones" => ''
        ]);

        if($prestamo) {
            $data = $all['data'];
            foreach ($all['prestamoEquipo'] as $value) {
                PrestamoItem::create([
                    "equipo_id" => $value['id'],
                    "prestamo_id" => $prestamo->id
                ]);

                Equipo::where('id', $value['id'])->update([ 'estado' => 2]);
            }

            PrestamoDetalle::create([
                "prestamo_id" => $prestamo->id,
                "dui"         => $data['dui'],
                "nombres"     => $data['nombres'],
                "apellidos"   => $data['apellidos']
            ]);
            DB::commit();
            return json_encode(["response" => true]);
        }

        DB::rollback();
        return json_encode(["response" => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        return view('prestamos.views', compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        $all = $request->all();
        
        $prestamo->estado = 0;
        $prestamo->observaciones = $all['d'];

        if($prestamo->save()) {
            return json_encode(["response" => true]);
        }else {
            return json_encode(["response" => false]);
        }
    }


    public function searchTipoEquipo(Request $request)
    {
        $tipo = $request->get('tipo');
        return Equipo::where('tipo_equipo_id', $tipo)
                    ->where('estado', 1)
                    ->limit(6)
                    ->select('codigo', 'marca', 'modelo', 'id')
                    ->get();
    }

    public function modal()
    {
        return view('prestamos.modal', []);
    }
}
