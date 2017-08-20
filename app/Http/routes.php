<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'maestros','namespace'=>'\Maestros'],function(){
    
    Route::resource('centros','CentroController');
    Route::resource('estados','EstadoController');
    Route::resource('localidades','LocalidadController');
    Route::resource('categorias','CategoriaController');
    Route::resource('proveedores','ProveedorController');
    Route::resource('servicios','ServicioController');
    Route::get('estado','EstadoController@eliminar');
    Route::get('proveedorDelete','ProveedorController@eliminar');
    Route::get('dropdown','CentroController@buscarLocalidades');
    Route::get('centroEliminar','CentroController@destroy');
    Route::get('servicioAgregar','ServicioController@store');
    Route::get('servicioListar','ServicioController@index');
});
Route::resource('solicitudes','SolicitudController');


Route::group(['prefix'=>'inventario','namespace'=>'\Inventario'],function() {
    
    Route::resource('equipos','InventarioController' );
    Route::get('dropDownBuscarServicios','InventarioController@buscarServicios');

});