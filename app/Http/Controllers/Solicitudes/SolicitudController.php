<?php

namespace dgmtm\Http\Controllers\Solicitudes;

use dgmtm\Centro;
use dgmtm\Equipo;
use dgmtm\Http\Requests\CreateSolicitudRequest;
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
        return view('solicitudes.solicitudservicio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros=Centro::with('equipo')
            ->orderBy('nomb_centro','DESC')
            ->lists('nomb_centro','id');
        return view('solicitudes.solicitudservicio.create',compact('centros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
//            $solicitud=new Solicitud();
//            $solicitud->numero_solicitud=mb_strtoupper($request->numerosolicitud);
//            $solicitud->fecha_recibo=date('Y-m-d',strtotime($request->fecharecibo));
//            $solicitud->status=$request->status;
//            $solicitud->centro_id=$request->centroid;
//            $solicitud->jefe_servicio=mb_strtoupper($request->jefeservicio);
//            $solicitud->responsable_emision=mb_strtoupper($request->responsable);
//            $solicitud->save();

                dd($data=json_decode($request->ereportados));


//            foreach ($equiposreportados as $equipos)
//            {
//                echo $equipos->id;
//                echo $equipos->falla_reportada;
//            }



        }
//        $solicitud=new Solicitud();
//        $solicitud->numero_solicitud=mb_strtoupper($request->numero_solicitud);
//        $solicitud->fecha_recibo=date('Y-m-d',strtotime($request->fecha_recibo));
//        $solicitud->status=$request->status;
//        $solicitud->centro_id=$request->centro_id;
//        $solicitud->jefe_servicio=mb_strtoupper($request->jefe_servicio);
//        $solicitud->responsable_emision=mb_strtoupper($request->responsable_emision);
//        $solicitud->save();
//        $solicitud->equipo()->attach(2,['falla_reportada' => 'culantropia']);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            $equipoListar=Equipo::where('centro_id','=',$request->centroId)
                ->with('tipoequipo')
                ->get();
            return response()->json([
                'equipoListar' => $equipoListar
            ]);


        }
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

    public function buscarEquipo(Request $request)
    {
        if($request->ajax())
        {
            $equipoBuscar=Equipo::where('centro_id','=',$request->centro)
                ->where('id','=',$request->id)
                ->with('tipoequipo')
                ->get();
            return response()->json([
                'equipoBuscar' => $equipoBuscar
            ]);



        }

    }


}
