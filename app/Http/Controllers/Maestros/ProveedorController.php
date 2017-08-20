<?php

namespace dgmtm\Http\Controllers\Maestros;

use dgmtm\Http\Requests\CreateProveedorRequest;
use dgmtm\Http\Requests\EditProveedorRequest;
use dgmtm\Proveedor;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=Proveedor::paginate(10);
        
        return view('maestros.proveedores.index',compact('proveedores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maestros.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProveedorRequest $request)
    {
        $proveedor=new Proveedor();
        $proveedor->rif_proveedor=mb_strtoupper($request->rif_proveedor);
        $proveedor->nomb_proveedor=mb_strtoupper($request->nomb_proveedor);
        $proveedor->telf_proveedor=mb_strtoupper($request->telf_proveedor);
        $proveedor->correo_proveedor=mb_strtoupper($request->correo_proveedor);
        $proveedor->contacto_proveedor=mb_strtoupper($request->contacto_proveedor);
        $proveedor->save();
        $insert=trans('validation.attributes.message.insert');
        $bandera='insert';
        Session::flash('bandera',$bandera);
        Session::flash('message',$insert);
        return redirect()->route('maestros.proveedores.index');

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
        $proveedor=Proveedor::findOrFail($id);
        return view ('maestros.proveedores.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProveedorRequest $request, $id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->rif_proveedor=mb_strtoupper($request->rif_proveedor);
        $proveedor->nomb_proveedor=mb_strtoupper($request->nomb_proveedor);
        $proveedor->telf_proveedor=mb_strtoupper($request->telf_proveedor);
        $proveedor->correo_proveedor=mb_strtoupper($request->correo_proveedor);
        $proveedor->contacto_proveedor=mb_strtoupper($request->contacto_proveedor);
        $proveedor->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('bandera',$bandera);
        Session::flash('message',$update);
        return redirect()->route('maestros.proveedores.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->delete();
        $message=trans('validation.attributes.message.delete');
        $nombre=$proveedor->nomb_proveedor;
        $delete=$message." al proveedor ".$nombre;
        $bandera='delete';
        Session::flash('bandera',$bandera);
        Session::flash('message',$delete);
        return redirect()->route('maestros.proveedores.index');
    }
    public function eliminar(Request $request)
    {
        
        if($request->ajax())
        {
            $proveedor=Proveedor::findOrFail($request->id);
            $proveedor->delete();
            $message=trans('validation.attributes.message.delete');
            $nombre=$proveedor->nomb_proveedor;
            $delete=$message." al proveedor ".$nombre;
            
            return response()->json([
                'message' => $delete
                
            ]);
        }
    }
}
