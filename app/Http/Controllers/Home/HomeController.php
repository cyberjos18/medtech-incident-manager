<?php

namespace dgmtm\Http\Controllers\Home;

use Auth;
use Illuminate\Http\Request;

use dgmtm\Http\Requests;
use dgmtm\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::viaRemember())
        {
            return view('dashboard.inicio');
        }

        $estatus=Auth::user()->estatus;
        if($estatus==='Activo' && Auth::check())
        {
            
            return view('dashboard.inicio');
            
            
        }
        else
            if($estatus==='Inactivo')
        {
            $message='El usuario esta inactivo, contacte al administrador';
            $info=$message;
            $bandera='info';
            Session::flash('bandera',$bandera);
            Session::flash('message',$info);
            Auth::logout();
            return redirect()->route('auth/login');
        }
        else
        {
            $message='El usuario no  tiene un estatus valido!!!';
            $info=$message;
            $bandera='info';
            Session::flash('bandera',$bandera);
            Session::flash('message',$info);
            Auth::logout();
            return redirect()->route('auth/login');
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
