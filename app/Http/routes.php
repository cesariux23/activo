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
Route::resource('codigos','CodigoController');

Route::resource('reportes','ReportesController');

//exportar a excel
Route::get('/excel', 'ActivoFijoController@excel');

//ruta para imprimir
Route::get('imprime','ReportesController@imprime');

//ruta para exportar
Route::get('exportar','ReportesController@exportar');

Route::resource('especifico','EspecificosController');

Route::resource('vales','ValesController');

Route::resource('tipoadquisiciones','TipoAdquisicionController');

Route::group(['prefix' => 'estatal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});

Route::group(['prefix' => 'federal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});

//bajas
Route::group(['prefix' => 'baja/federal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});
Route::group(['prefix' => 'baja/estatal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});

//bajas definitivas
Route::group(['prefix' => 'bajadefinitiva/federal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});
Route::group(['prefix' => 'bajadefinitiva/estatal'], function()
{
    Route::resource('activofijo', 'ActivoFijoController');
});