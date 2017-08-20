<?php

namespace dgmtm\Http\Controllers;

use dgmtm\Centro;
use dgmtm\Equipo;
use dgmtm\Estado;
use dgmtm\Localidad;
use dgmtm\ReporteProveedor;
use dgmtm\Servicio;
use dgmtm\Solicitud;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      /*  $reportes=ReporteProveedor::select('*')
            ->with('autorizacion')
            ->where('numero_autorizacion_id','=','1100')
            ->get();
        foreach ($reportes as $reporte)
        {
            echo $reporte->autorizacion->numero_autorizacion;
            echo '</br>';
            echo $reporte->autorizacion->proveedor->nomb_proveedor;
            echo '</br>';
            echo $reporte->autorizacion->fecha_autorizacion;
            echo '</br>';
            echo $reporte->autorizacion->status;
            echo '</br>';
            echo $reporte->numero_reporte;
            echo '</br>';
            echo $reporte->fecha_atencion;
            echo '</br>';
            echo $reporte->tecnico_responsable;

        }*/
       /* foreach (Estado::find($id)->localidad as $local)
        {
            echo $local->nomb_localidad;
            echo '</br>';

        }*/

       /* $centro=Centro::select('*')
            ->with('localidad','estado','categoria')
            ->where('id','=','1')
            ->first();
        echo $centro->nomb_centro;
        echo '</br>';
        echo $centro->estado->nomb_estado;
        echo '</br>';
        echo $centro->localidad->nomb_localidad;
        echo '</br>';
        echo $centro->categoria->nomb_categoria;
        echo '</br>';
        $id=$centro->id;
        foreach (Centro::find($id)->equipo as $equipos)
        {
           echo '</br>';
           echo $equipos->servicio->nomb_servicio;;
           echo '</br>';
           echo  $equipos->nomb_equipo;
            echo '</br>';
           echo  $equipos->marca_equipo;
            echo '</br>';
           echo  $equipos->modelo_equipo;
           echo '</br>';

        }
        echo '</br>';
        foreach (Centro::find($id)->servicio as $servicios)
        {
            echo $servicios->nomb_servicio;
            echo '</br>';
        }*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
