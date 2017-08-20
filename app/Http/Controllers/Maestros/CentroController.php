<?php

namespace dgmtm\Http\Controllers\Maestros;

use dgmtm\Categoria;
use dgmtm\Centro;
use dgmtm\Estado;
use dgmtm\Http\Requests\CreateCentroRequest;
use dgmtm\Http\Requests\EditCentroRequest;
use dgmtm\Localidad;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centros = Centro::orderBy('nomb_centro', 'ASC')
            ->with('estado', 'localidad', 'categoria')
            ->paginate(10);

        return view('maestros.centros.index', compact('centros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::orderBy('nomb_categoria','ASC')->lists('nomb_categoria','id');
        $estados=Estado::select('estados.id','estados.nomb_estado')
           /* ->join('localidades','estados.id','=','localidades.estado_id')*/
            ->with('localidad')
            ->orderBy('nomb_estado','ASC')
            ->lists('nomb_estado','id');

       
        return view('maestros.centros.create',compact('categorias','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCentroRequest $request)
    {
        $centro=new Centro();
        $centro->nomb_centro=mb_strtoupper($request->nomb_centro);
        $centro->director_centro=mb_strtoupper($request->director_centro);
        $centro->categoria_id=mb_strtoupper($request->categoria_id);
        $centro->estado_id=mb_strtoupper($request->estado_id);
        $centro->localidad_id=mb_strtoupper($request->localidad_id);
        $centro->save();
        $insert=trans('validation.attributes.message.insert');
        $bandera='insert';
        Session::flash('bandera',$bandera);
        Session::flash('message',$insert);
        return redirect()->route('maestros.centros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro=Centro::findOrFail($id);
        $categorias=Categoria::orderBy('nomb_categoria','ASC')->lists('nomb_categoria','id');
        $estados=Estado::select('estados.id','estados.nomb_estado')
            ->with('localidad')
            ->orderBy('nomb_estado','ASC')
            ->lists('nomb_estado','id');
        $localidades=Localidad::select('localidades.id','localidades.nomb_localidad')
            ->with('estado')
            ->where('localidades.estado_id','=',$centro->estado_id)
            ->orderBy('nomb_localidad','ASC')
            ->lists('nomb_localidad','id');
        return view('maestros.centros.edit',compact('centro','categorias','estados','localidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCentroRequest $request, $id)
    {
        $centro=Centro::findOrFail($id);
        $centro->nomb_centro=mb_strtoupper($request->nomb_centro);
        $centro->director_centro=mb_strtoupper($request->director_centro);
        $centro->categoria_id=($request->categoria_id);
        $centro->estado_id=mb_strtoupper($request->estado_id);
        $centro->localidad_id=($request->localidad_id);
        $centro->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('message',$update);
        Session::flash('bandera',$bandera);
        return redirect()->route('maestros.centros.index');

        /*if($request->ajax())
        {
            $centro=Centro::findOrFail($request->id);
            $centro->nomb_centro=mb_strtoupper($request->nombCentro);
            $centro->director_centro=mb_strtoupper($request->dirNombre);
            $centro->categoria_id=($request->categoriaId);
            $centro->estado_id=mb_strtoupper($request->estadoId);
            $centro->localidad_id=($request->localidadId);
            $centro->save();
            $update=trans('validation.attributes.message.update');
            return response()->json([
                'message'=>$update

            ]);
          
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax())
        {
            $centro=Centro::findOrFail($request->id);
            $centro->delete();
            $message=trans('validation.attributes.message.delete');
            $nombre=$centro->nomb_centro;
            $delete=$message.' al centro de atención '.$nombre;

            return response()->json([
               'message'=>$delete,
            ]);

        }
        

    }

    public function buscarLocalidades(Request $request)
    {
       /* $id=Input::get('option');
        $localidades=Estado::find($id)->localidad;
        return $localidades->lists('nomb_localidad','id');*/
        
        if($request->ajax())
        {
            
            $id=$request->id;
            $localidades=Estado::find($id)->localidad;
           return $localidades->lists('nomb_localidad','id');
           
                
        }
       
    }
}
