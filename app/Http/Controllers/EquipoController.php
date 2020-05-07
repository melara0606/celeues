<?php
namespace App\Http\Controllers;

use App\Equipo;
use App\TipoEquipo;
use App\Configuraciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*INSERT INTO `tipo_equipo` (`id`, `nombre_tipo`, `created_at`, `updated_at`) VALUES
        (1, 'Grabadora', '2019-12-28 01:53:47', '2019-12-28 01:53:47'),
        (2, 'Laptop', '2019-12-28 01:53:47', '2019-12-28 01:53:47');*/
        if(count(TipoEquipo::get())== 0 ){
            TipoEquipo::create([
                'nombre_tipo'=>'Grabadora',
            
            ]);
            TipoEquipo::create([
                'nombre_tipo'=>'Laptop',
            ]); 
        
        }
        $equipos = Equipo::all();
        return view('equipos.showEquipo', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all = TipoEquipo::all();
        return view('equipos.create', [
            'tipos' => $all
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $configuracion = Configuraciones::find(1);
        $codigoEquipo = $this->generateCodigoEquipo($configuracion->cantidad);

        $equipo = new Equipo;
        $equipo->codigo = $codigoEquipo;
        $equipo->estado = 1;
        $equipo->observacion = '';
        $equipo->marca = $request->get('marca');
        $equipo->nserie = $request->get('serie');
        $equipo->precio = $request->get('precio');
        $equipo->modelo = $request->get('modelo');
        $equipo->fechaAd = $request->get('fechaAquisicion');
        $equipo->description = $request->get('descripcion');
        $equipo->tipo_equipo_id = $request->get('tipo_equipo');
        $equipo->save();

        $configuracion->cantidad += 1;
        $configuracion->save();
        
        return redirect('/equipos');
    }

    private function generateCodigoEquipo($valor) {
        $inicio = "EQ";
        $complemento = "00".$valor;

        if($valor > 9)
            $complemento = "0".$valor;
        else if($valor > 99)
            $complemento = $valor;
        return "$inicio$complemento";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        $all = TipoEquipo::all();
        return view('equipos.edit', [
            'item'  => $equipo,
            'tipos' => $all
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $equipo->description = $request->get('descripcion');
        $equipo->marca = $request->get('marca');
        $equipo->modelo = $request->get('modelo');
        $equipo->nserie = $request->get('serie');
        $equipo->fechaAd = $request->get('fechaAquisicion');
        $equipo->precio = $request->get('precio');
        $equipo->tipo_equipo_id = $request->get('tipo_equipo');
        $equipo->save();

        return redirect("/equipos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
