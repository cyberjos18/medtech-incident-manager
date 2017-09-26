<?php

namespace dgmtm\Http\Controllers\Inventario;

use dgmtm\Centro;
use dgmtm\Equipo;
use dgmtm\Http\Requests\CreateInventarioRequest;
use dgmtm\Http\Requests\EditInventarioRequest;
use dgmtm\Servicio;
use dgmtm\TipoEquipo;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos=Equipo::orderBy('tipoequipo_id','ASC')
            ->with('centro','servicio')
            ->paginate(10);
            return view('inventario.equipos.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros=Centro::orderBy('nomb_centro','ASC')
            ->lists('nomb_centro','id');
        $tipos=TipoEquipo::orderBy('tipo_equipo','ASC')
            ->lists('tipo_equipo','id');
        return view('inventario.equipos.create',compact('centros','tipos'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInventarioRequest $request)
    {
        $equipos=new Equipo();
        $equipos->centro_id=$request->centro_id;
        $equipos->servicio_id=$request->servicio_id;
        $equipos->tipoequipo_id=$request->tipoequipo_id;
        $equipos->marca_equipo=mb_strtoupper($request->marca_equipo);
        $equipos->modelo_equipo=mb_strtoupper($request->modelo_equipo);
        $equipos->serial_equipo=mb_strtoupper($request->serial_equipo);
        $equipos->bien_nacional=mb_strtoupper($request->bien_nacional);
        $equipos->estatus_equipo=$request->estatus_equipo;
        $equipos->equipo_garantia=mb_strtoupper($request->equipo_garantia);
        $equipos->responsable_garantia=mb_strtoupper($request->responsable_garantia);
        $equipos->duracion_garantia=mb_strtoupper($request->duracion_garantia);
        $equipos->observaciones_equipo=mb_strtoupper($request->observaciones_equipo);
        $equipos->save();
        $insert=trans('validation.attributes.message.insert');
        $bandera='insert';
        Session::flash('bandera',$bandera);
        Session::flash('message',$insert);
        return redirect()->route('inventario.equipos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo=Equipo::findOrFail($id);
        $centros=Centro::orderBy('nomb_centro','ASC')
            ->lists('nomb_centro','id');
        $servicios=Servicio::orderBy('nomb_servicio','ASC')
            ->where('servicios.centro_id','=',$equipo->centro_id)
            ->lists('nomb_servicio','id');
        $tipos=TipoEquipo::orderBy('tipo_equipo','ASC')
            ->lists('tipo_equipo','id');

        return view('inventario.equipos.edit',compact('centros','equipo','servicios','tipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditInventarioRequest $request, $id)
    {
        $equipos=Equipo::findOrFail($id);
        $equipos->centro_id=$request->centro_id;
        $equipos->servicio_id=$request->servicio_id;
        $equipos->tipoequipo_id=$request->tipoequipo_id;
        $equipos->marca_equipo=mb_strtoupper($request->marca_equipo);
        $equipos->modelo_equipo=mb_strtoupper($request->modelo_equipo);
        $equipos->serial_equipo=mb_strtoupper($request->serial_equipo);
        $equipos->bien_nacional=mb_strtoupper($request->bien_nacional);
        $equipos->estatus_equipo=$request->estatus_equipo;
        $equipos->equipo_garantia=mb_strtoupper($request->equipo_garantia);
        $equipos->responsable_garantia=mb_strtoupper($request->responsable_garantia);
        $equipos->duracion_garantia=mb_strtoupper($request->duracion_garantia);
        $equipos->observaciones_equipo=mb_strtoupper($request->observaciones_equipo);
        $equipos->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('bandera',$bandera);
        Session::flash('message',$update);
        return redirect()->route('inventario.equipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax())
        {
            $equipo=Equipo::findOrFail($request->id);
            $equipo->delete();
            $message=trans('validation.attributes.message.delete');
            $delete=$message.' al equipo '.$equipo->nomb_equipo;
            return response()->json([
                'message'=>$delete,
            ]);
        }
    }
    
    public function buscarServicios(Request $request)
    {
        if($request->ajax())
        {
            $id=$request->id; /*Esta es la manera de realizar la busqueda usando Eloquent si se desea alimentar una etiqueta de tipo Select*/
            $servicios=Centro::find($id)->servicio;
           return  $servicios->lists('nomb_servicio','id');
        }
    }
}
