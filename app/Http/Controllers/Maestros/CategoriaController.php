<?php

namespace dgmtm\Http\Controllers\Maestros;

use dgmtm\Categoria;
use dgmtm\Http\Requests\CreateCategoriaRequest;
use dgmtm\Http\Requests\CreateLocalidadRequest;
use dgmtm\Http\Requests\EditCategoriaRequest;
use dgmtm\Http\Requests\EditLocalidadRequest;
use dgmtm\Localidad;
use Exception;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use PhpParser\Error;
use PhpSpec\Exception\Example\ErrorException;
use Symfony\Component\Debug\Exception\FatalErrorException;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nomb_categoria', 'ASC')
            ->paginate(4);
        return view('maestros.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maestros.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriaRequest $request)
    {

        try {
            $categoria = new Categoria();
            $categoria->nomb_categoria = mb_strtoupper($request->nomb_categoria);
            $categoria->save();
            $insert = trans('validation.attributes.message.insert');
            Session::flash('message', $insert);
            $bandera=1;
                        
        } catch (Exception $e) {
            $error = trans('validation.attributes.message.error');
            Session::flash('message', $error.$e);
            $bandera=0;
        }
        Session::flash('bandera',$bandera);
        return redirect()->route('maestros.categorias.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view('maestros.categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoriaRequest $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nomb_categoria=mb_strtoupper($request->nomb_categoria);
        $categoria->save();
        $update=trans('validation.attributes.message.update');
        $bandera='update';
        Session::flash('message',$update);
        Session::flash('bandera',$bandera);
        
        return redirect()->route('maestros.categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        $message=trans('validation.attributes.message.delete');
        $nombre=$categoria->nomb_categoria;
        $delete=$message.' a la categoria '.$nombre;
        $bandera='delete';
        Session::flash('message',$delete);
        Session::flash('bandera',$bandera);
        if($request->ajax())
        {
            return response()->json([
               'message'=>$delete 
            ]);
                
        }
        return redirect()->route('maestros.categorias.index');

    }
}
