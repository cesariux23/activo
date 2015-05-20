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

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('usuarios', 'UsuarioController');
Route::resource('empleados', 'EmpleadosController');
Route::resource('adscripciones', 'OficinasController');

Route::resource('activofederal', 'ActivoFederalController');
Route::resource('activoestatal', 'ActivoEstatalController');

Route::resource('proveedores', 'ProveedoresController');

Route::resource('movimientos', 'MovimientosController');

 Route::resource('activofijo', 'ActivoFijoController');


Route::resource('rubros','RubrosController');
Route::resource('reportes','ReportesController');

Route::resource('tipoadquisiciones','TipoAdquisicionController');

Route::group(['prefix' => 'estatal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});

Route::group(['prefix' => 'federal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});
