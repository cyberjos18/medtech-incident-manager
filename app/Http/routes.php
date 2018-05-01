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

//Route::get('/', function () {
//
//    return view('dashboard.inicio');
//});
Route::group(['middleware' => ['language']], function () {
Route::resource('/','Home\HomeController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return \Redirect::back();
})->where([
    'lang' => 'en|es'
]);

//// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email',['as'=>'password/email','uses'=>'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::post('verEstatus',['as'=>'verEstatus','uses'=>'VerEstatusController@verEstatus']);

Route::group(['prefix'=>'maestros','namespace'=>'\Maestros'],function(){
    
    Route::resource('centros','CentroController');
    Route::resource('estados','EstadoController');
    Route::resource('localidades','LocalidadController');
    Route::resource('categorias','CategoriaController');
    Route::resource('proveedores','ProveedorController');
    Route::resource('servicios','ServicioController');
    Route::resource('tiposequipos','TipoEquipoController');
    Route::resource('usuarios','UserController');
    Route::get('estado','EstadoController@eliminar');
    Route::get('proveedorDelete','ProveedorController@eliminar');
    Route::get('buscarLocalidad','CentroController@buscarLocalidades');
    Route::get('centroEliminar','CentroController@destroy');
    Route::get('servicioAgregar','ServicioController@store');
    Route::get('servicioListar','ServicioController@index');
    Route::get('servicioEliminar','ServicioController@destroy');
    Route::get('tipoDelete','TipoEquipoController@destroy');

});
Route::group(['prefix'=>'inventario','namespace'=>'\Inventario'],function() {
    
    Route::resource('equipos','InventarioController' );
    Route::get('dropDownBuscarServicios','InventarioController@buscarServicios');
    Route::get('equipoEliminar','InventarioController@destroy');

});
Route::group(['prefix'=>'solicitudes','namespace'=>'\Solicitudes'],function(){
    Route::resource('solicitudservicio','SolicitudController');
    Route::get('equipoListar','SolicitudController@show');
    Route::get('equipoBuscar','SolicitudController@buscarEquipo');
    Route::get('solicitudGuardar','SolicitudController@store');
    Route::post('validarCampos', 'SolicitudController@validarCampos');
});
Route::group(['prefix'=>'autorizaciones','namespace'=>'\Autorizaciones'],function(){
   Route::resource('autorizacionservicio','AutorizacionController');

});
});