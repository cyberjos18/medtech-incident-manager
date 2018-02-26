<?php

namespace dgmtm\Http\Controllers\Autorizaciones;

use dgmtm\Autorizacion;
use dgmtm\Http\Requests\CreateAutorizacionRequest;
use dgmtm\Proveedor;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AutorizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autorizaciones=Autorizacion::orderBy('numero_autorizacion','ASC')
            ->with('proveedor')
            ->get();
        return view('autorizaciones.autorizacionservicio.index',compact('autorizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores=Proveedor::orderBy("nomb_proveedor",'ASC')
            ->lists('nomb_proveedor','id');
        return view('autorizaciones.autorizacionservicio.create',compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAutorizacionRequest $request)
    {
        $autorizacion= new Autorizacion();
        $autorizacion->numero_autorizacion=mb_strtoupper($request->numero_autorizacion);
        $autorizacion->fecha_autorizacion=Autorizacion::convertirFormatoFechaCarbon($request->fecha_autorizacion);
        $autorizacion->proveedor_id=$request->proveedor_id;
        $autorizacion->status=$request->status;
        $autorizacion->seguimiento=mb_strtoupper($request->seguimiento);
        $autorizacion->save();
        $insert=trans('validation.attributes.message.insert');
        $bandera='insert';
        Session::flash('bandera',$bandera);
        Session::flash('message',$insert);

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
        //
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
        //
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
