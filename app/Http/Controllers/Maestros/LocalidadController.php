<?php

namespace dgmtm\Http\Controllers\Maestros;

use dgmtm\Estado;
use dgmtm\Http\Requests\CreateLocalidadRequest;
use dgmtm\Http\Requests\EditEstadoRequest;
use dgmtm\Http\Requests\EditLocalidadRequest;
use dgmtm\Localidad;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;


class LocalidadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localidades=Localidad::orderBy('nomb_localidad','ASC')
        ->with('estado')
        ->paginate(10);
        return view('maestros.localidades.index',compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=Estado::orderBy('nomb_estado','ASC')->lists('nomb_estado','id');

        return view('maestros.localidades.create',compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $data=
                [
                  'estado_id' => $request->estado_id,
                  'nomb_localidad' => $request->nomb_localidad
                ];
            $rules=
                [
                    'estado_id' => 'required',
                    'nomb_localidad' => 'required'
                ];
            $messages=
                [
                    'estado_id.required' => 'Necesitamos que elija un estado',
                    'nomb_localidad.required' => 'Necesitamos el nombre de la localidad',
                    'nomb_localidad.unique' => 'La localidad ya esta registrada para este estado'
                ];

            $v=Validator::make($data,$rules,$messages);


            $v->sometimes('nomb_localidad','required|unique:localidades',function($input)
            {

                $estado=Localidad::select('estado_id','nomb_localidad')
                    ->where('estado_id','=',$input->estado_id)
                    ->where('nomb_localidad','=',$input->nomb_localidad)
                    ->selectRaw('count(*) as cantidad')
                    ->first();


                $valor=$estado->cantidad;

                if($valor!=0)
                {
                    return $input->estado_id=$estado->estado_id;
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
                $localidad=new Localidad();
                $localidad->estado_id=$request->estado_id;
                $localidad->nomb_localidad=mb_strtoupper($request->nomb_localidad);
                $localidad->save();
                $insert=trans('validation.attributes.message.insert');
                $bandera='insert';
                Session::flash('bandera',$bandera);    
                Session::flash('message',$insert);
                return redirect()->route('maestros.localidades.index');

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
        $localidad=Localidad::findOrFail($id);
        $estado_id=$localidad->estado_id;
        $estado=Estado::select('id','nomb_estado')
            ->where('id','=',$estado_id)
            ->lists('nomb_estado','id');

        return view('maestros.localidades.edit',compact('localidad','estado'));
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
                'estado_id' => $request->estado_id,
                'nomb_localidad' => $request->nomb_localidad
            ];
        $rules=
            [
                'estado_id' => 'required',


            ];
        $messages=
            [
                'estado_id.required' => 'Necesitamos que elija un estado',
                'nomb_localidad.required' => 'Necesitamos el nombre de la localidad',
                'nomb_localidad.unique' => 'La localidad ya esta registrada para este estado'

            ];

        $v=Validator::make($data,$rules,$messages);
        $v->sometimes('nomb_localidad','required|unique:localidades,nomb_localidad,9',function($input)
        {

            $estado=Localidad::select('estado_id','nomb_localidad')
                ->where('estado_id','=',$input->estado_id)
                ->where('nomb_localidad','=',$input->nomb_localidad)
                ->selectRaw('count(*) as cantidad')
                ->first();


            $valor=$estado->cantidad;

            if($valor>1)
            {
                return $input->estado_id=$estado->estado_id;
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
            $localidad=Localidad::findOrFail($id);
            $localidad->estado_id=$request->estado_id;
            $localidad->nomb_localidad=mb_strtoupper($request->nomb_localidad);
            $localidad->save();
            $update=trans('validation.attributes.message.update');
            $bandera='update';
            Session::flash('bandera',$bandera);
            Session::flash('message',$update);
            return redirect()->route('maestros.localidades.index');


        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        
        $localidad=Localidad::findOrFail($id);
        $localidad->delete();
        $message=trans('validation.attributes.message.delete');
        $nombre=$localidad->nomb_localidad;
        $delete=$message.' a la localidad '.$nombre;
        $bandera='delete';
        Session::flash('bandera',$bandera);
        Session::flash('message',$delete);
        if($request->ajax())
        {
            return response()->json([
                'message'=>$delete
            ]);

        }
        return redirect()->route('maestros.localidades.index');
    }
}
