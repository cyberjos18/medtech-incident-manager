<?php

namespace dgmtm\Http\Controllers\Maestros;

use dgmtm\Http\Requests\CreateTipoEquipoRequest;
use dgmtm\Http\Requests\EditTipoEquipoRequest;
use dgmtm\TipoEquipo;
use Illuminate\Http\Request;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos=TipoEquipo::orderBy('tipo_equipo','ASC')
            ->paginate(10);
        return view('maestros.tiposequipos.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maestros.tiposequipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTipoEquipoRequest $request)
    {
        $tipoequipo=new TipoEquipo();
        $tipoequipo->tipo_equipo=mb_strtoupper($request->tipo_equipo);
        $tipoequipo->save();
        $insert=trans('validation.attributes.message.insert');
        $bandera='insert';
        Session::flash('bandera',$bandera);
        Session::flash('message',$insert);
        return redirect()->route('maestros.tiposequipos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoequipo=TipoEquipo::findOrFail($id);
        return view('maestros.tiposequipos.edit',compact('tipoequipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTipoEquipoRequest $request, $id)
    {
        $tipoequipo=TipoEquipo::findOrFail($id);
        $tipoequipo->tipo_equipo=mb_strtoupper($request->tipo_equipo);
        $tipoequipo->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('bandera',$bandera);
        Session::flash('message',$update);
        return redirect()->route('maestros.tiposequipos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request)
    {
        if($request->ajax())
        {

            $tipo=TipoEquipo::findOrFail($request->id);
            $tipo->delete();
            $message=trans('validation.attributes.message.delete');
            $nombre=$tipo->tipo_equipo;
            $delete=$message." al tipo de equipo ".$nombre;

            return response()->json([
                'message' => $delete
            ]);
        }
    }
}
