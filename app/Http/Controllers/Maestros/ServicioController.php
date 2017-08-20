<?php

namespace dgmtm\Http\Controllers\Maestros;

use dgmtm\Estado;
use dgmtm\Servicio;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $servicio=Servicio::orderBy('nomb_servicio','ASC')
                ->with('centro')
                ->where('centro_id','=',$request->centroId)
                ->get();
            return response()->json([
               'resultado'=>$servicio
            ]);
        }

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
        if($request ->ajax())
        {
            $servicio=new Servicio();
            $servicio->centro_id=$request->centroId;
            $servicio->nomb_servicio=mb_strtoupper($request->nombServicio);
            $servicio->save();
            $insert=trans('validation.attributes.message.insert');
            
            
            return response()->json([
               'message' => $insert
            ]);
        }
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
        $servicio=Servicio::findOrFail($id);
        return view('maestros.servicios.edit',compact('servicio'));
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

        $data=
            [
                'centro_id' => $request->centro_id,
                'nomb_servicio' => $request->nomb_servicio
            ];
        $rules=
            [
                'nomb_servicio' => 'required',


            ];
        $messages=
            [

                'nomb_servicio.required' => 'Necesitamos el nombre del servicio',
                'nomb_servicio.unique' => 'El servicio ya esta registrada para este centro de atención'

            ];

        $v=Validator::make($data,$rules,$messages);
        $v->sometimes('nomb_servicio','required|unique:servicios,nomb_servicio,'.$request->id,function($input)
        {

            $servicio=Servicio::select('centro_id','nomb_servicio')
                ->where('centro_id','=',$input->centro_id)
                ->where('nomb_servicio','=',$input->nomb_servicio)
                ->selectRaw('count(*) as cantidad')
                ->first();

            $valor=$servicio->cantidad;

            if($valor>1)
            {
                return $input->centro_id=$servicio->centro_id;
            }

        });

        if ($v->fails())
        {
            return redirect()->back()
                ->withErrors($v->errors())
                ->withInput();
        }
        else
        {
            $servicio=Servicio::findOrFail($id);
            $servicio->centro_id=$request->centro_id;
            $servicio->nomb_servicio=mb_strtoupper($request->nomb_servicio);
            $servicio->save();
            $update=trans('validation.attributes.message.update');
            $bandera='update';
            Session::flash('bandera',$bandera);
            Session::flash('message',$update);
            return redirect()->route('maestros.centros.index');


        }



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
