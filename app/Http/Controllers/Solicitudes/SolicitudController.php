<?php

namespace dgmtm\Http\Controllers\Solicitudes;

use Carbon\Carbon;
use dgmtm\Centro;
use dgmtm\Equipo;
use dgmtm\Http\Requests\CreateSolicitudRequest;
use dgmtm\Http\Requests\EditSolicitudRequest;
use dgmtm\Solicitud;
use Faker\Provider\zh_TW\DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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
        $solicitudes=Solicitud::orderBy('numero_solicitud','ASC')
            ->get();


        return view('solicitudes.solicitudservicio.index',compact('solicitudes'));
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
        if($request->ajax()) {

            $solicitud=new Solicitud();
            $date=$solicitud->convertirFormatoFechaMysql($request->fecharecibo);
            $solicitud->numero_solicitud=mb_strtoupper($request->numerosolicitud);
            $solicitud->fecha_recibo=$date;
            $solicitud->status=$request->status;
            $solicitud->centro_id=$request->centroid;
            $solicitud->jefe_servicio=mb_strtoupper($request->jefeservicio);
            $solicitud->responsable_emision=mb_strtoupper($request->responsable);
            $solicitud->observaciones=mb_strtoupper($request->observaciones);
            $solicitud->save();
            $arreglo=json_decode($request->ereportados);
            foreach ($arreglo as $array)
            {
            $solicitud->equipo()->attach($array->id,['falla_reportada' => $array->falla]);
            }
            return response()->json([
                'mensaje' =>'Registro Exitoso'
            ]);


        }



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
        $centros=Centro::with('equipo')
            ->orderBy('nomb_centro','DESC')
            ->lists('nomb_centro','id');
//        $solicitudes=Solicitud::select('numero_solicitud',DB::raw('DATE_FORMAT(fecha_recibo,"%d-%m-%Y") as fecha_recibo',
//            'status','centro_id','jefe_servicio','responsable_emision')
//            ->findOrFail($id);
        $solicitudes=Solicitud::findOrFail($id);
        return view('solicitudes.solicitudservicio.edit',compact('centros','solicitudes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSolicitudRequest $request, $id)
    {
        $data=new Solicitud();
        $solicitud=Solicitud::findOrFail($id);
        $solicitud->numero_solicitud=mb_strtoupper($request->numero_solicitud);
        $solicitud->fecha_recibo=date('Y-m-d',strtotime($request->fecha_recibo));
        $solicitud->status=$request->status;
        $solicitud->observaciones=mb_strtoupper(($request->observaciones));
        $solicitud->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('message',$update);
        Session::flash('bandera',$bandera);
        return redirect()->route('solicitudes.solicitudservicio.index');
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validarCampos(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $rules = array
            (
                'numero_solicitud'   => 'required|max:25|unique:solicitudes',
//                'fecha_recibo'       => 'required|date_format:d/m/Y',
                'status'             => 'required',
                'centro_id'          => 'required',
                'jefe_servicio'      => 'required|max:25',
                'responsable_emision' => 'required|max:25',
                'observaciones'       => 'required'
            );
            $messages = array
            (
                'numero_solicitud.required'   => 'Necesitamos el número de solicitud',
                'numero_solicitud.max'        => 'El numero de solicitud debe contener maximo 25 caracteres',
                'numero_solicitud.unique'     => 'EL numero de solicitud ya existe !!!',
                'fecha_recibo.required'       => 'Necesitamos la fecha de recibo de la solicitud',
//                'fecha_recibo.date_format'    => 'El formato de la fecha es incorrecto debe ser: DD/MM/YYYY, DD/MM/YY',
                'status.required'             => 'Necesitamos que indique el estatus de la solicitud',
                'centro_id.required'          => 'Necesitamos el nombre del centro',
                'jefe_servicio.required'      => 'Necesitamos el nombre del jefe de servicio',
                'jefe_servicio.max'           => 'El nombre del jefe de servicio debe contener maximo 25 caracteres',
                'responsable_emision.required' => 'Necesitamos el nombre del emisor de la solicitud',
                'responsable_emision.max'      => 'El nombre del emisor debe contener maximo 25 caracteres',
                'observaciones.required'       => 'Debe describir en el campo "Observaciones" por que no procede la solicitud'

            );

            $v = Validator::make($data, $rules, $messages);
            if ($v->fails()) {
                redirect()->back()
                    ->withErrors($v->errors())
                    ->withInput();

                return response()->json([
                    'bandera' => 0
                ]);

            } else {

                return response()->json([
                    'bandera' => 1
                ]);


            }

        }

    }


}
