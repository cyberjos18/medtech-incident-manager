<?php

namespace dgmtm\Http\Controllers\Autorizaciones;

use dgmtm\Autorizacion;
use dgmtm\Http\Requests\CreateAutorizacionRequest;
use dgmtm\Http\Requests\EditAutorizacionRequest;
use dgmtm\Proveedor;
use dgmtm\Solicitud;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
            ->with('solicitud')
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
        $proveedores=Proveedor::orderBy('nomb_proveedor','ASC')
            ->lists('nomb_proveedor','id');
        $solicitudes=Solicitud::orderBy('numero_solicitud','ASC')
            ->lists('numero_solicitud','id');
//      dd ($prueba=Solicitud::select('numero_solciitud')
//           ->whereNotIn('id',['select autorizaciones.solicitud_id from autorizaciones'])
//           ->get());
//        dd($prueba2=DB::table('solicitudes')
//            ->select('id')
//            ->whereRaw('( select autorizaciones.solicitud_id from autorizaciones)',[],'id not in')
//            ->get());
//        dd($prueba3=DB::select('select id from solicitudes where id not in(select autorizaciones.solicitud_id from autorizaciones)'));
//
//        dd($prueba4=DB::table('solicitudes')
//            ->select('id')
//            ->whereRaw('id not in( select autorizaciones.solicitud_id from autorizaciones)')
//            ->get());
$valor=DB::select('select solicitud_id from autorizaciones');
        $array=[];
        foreach ($valor as $val)
        {
            $array=$val->solicitud_id;
        }
        
        dd($prueba5=Solicitud::select('i')
            ->whereNotIn('id',array())
            ->get());




        return view('autorizaciones.autorizacionservicio.create',compact('proveedores','solicitudes'));
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
        $autorizacion->solicitud_id=$request->solicitud_id;
        $autorizacion->status=$request->status;
        $autorizacion->seguimiento=mb_strtoupper($request->seguimiento);
        $autorizacion->save();
        $insert=trans('validation.attributes.message.insert');
        $bandera='insert';
        Session::flash('bandera',$bandera);
        Session::flash('message',$insert);
        return redirect()->route('autorizaciones.autorizacionservicio.index');

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
        $proveedores=Proveedor::orderBy('nomb_proveedor','ASC')
            ->lists('nomb_proveedor','id');
        $solicitudes=Solicitud::orderBy('numero_solicitud','ASC')
            ->lists('numero_solicitud','id');
        
        $autorizaciones=Autorizacion::findOrFail($id);
        return view("autorizaciones.autorizacionservicio.edit",compact('proveedores','solicitudes','autorizaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAutorizacionRequest $request, $id)
    {
        $autorizaciones=Autorizacion::findOrFail($id);
        $autorizaciones->numero_autorizacion=$request->numero_autorizacion;
        $autorizaciones->fecha_autorizacion=Autorizacion::convertirFormatoFechaCarbon($request->fecha_autorizacion);
        $autorizaciones->solicitud_id=$request->solicitud_id;
        $autorizaciones->proveedor_id=$request->proveedor_id;
        $autorizaciones->status=$request->status;
        $autorizaciones->seguimiento=$request->seguimiento;
        $autorizaciones->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('bandera',$bandera);
        Session::flash('message',$update);
        return redirect()->route('autorizaciones.autorizacionservicio.index');


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
