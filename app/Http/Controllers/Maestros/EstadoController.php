<?php

namespace dgmtm\Http\Controllers\Maestros;

use dgmtm\Estado;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use dgmtm\Http\Requests\EditEstadoRequest;
use dgmtm\Http\Requests\CreateEstadoRequest;
use Illuminate\Support\Facades\Session;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $estados=Estado::orderBy('nomb_estado','ASC')
        ->paginate(10);
        return view('maestros.estados.index',compact('estados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maestros.estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEstadoRequest $request)
    {
        
        $estado=new Estado();
        $estado->nomb_estado=mb_strtoupper($request->nomb_estado);
        $estado->save();
        $insert=trans('validation.attributes.message.insert');
        $bandera='insert';
        Session::flash('bandera',$bandera);
        Session::flash('message',$insert);
        return redirect()->route('maestros.estados.index');




        
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
        $estado=Estado::findOrFail($id);
        return view('maestros.estados.edit',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEstadoRequest $request, $id)
    {
        $estado=Estado::findOrFail($id);
        $estado->nomb_estado=mb_strtoupper($request->nomb_estado);
        $estado->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('bandera',$bandera);
        Session::flash('message',$update);
        return redirect()->route('maestros.estados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $estado=Estado::findOrFail($id);
        $estado->delete();
        $message=trans('validation.attributes.message.delete');
        $nombre=$estado->nomb_estado;
        $delete=$message.' al estado '.$nombre;
        $bandera='delete';
        Session::flash('bandera',$bandera);
        Session::flash('message',$delete);
        return redirect()->route('maestros.estados.index');
    }

    public function eliminar(Request $request)
    {
        if($request->ajax())
        {
            
            $estado=Estado::findOrFail($request->id);
            $estado->delete();
            $message=trans('validation.attributes.message.delete');
            $nombre=$estado->nomb_estado;
            $delete=$message.' al estado '.$nombre;

            return response()->json([
                'message' => $delete
            ]);
        }

    }
}
