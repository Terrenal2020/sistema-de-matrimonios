<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Personas;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ComprometidosController;
use App\Http\Livewire\Persona;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get( 'Inicio', 'Personas@getInicio' )->name( 'getInicio' );
//vista de registro de personas
//Route::get('/registro','App\Http\Controllers\PersonasController@getRegistro');
Route::get('/registro', 'App\Http\Controllers\PersonasController@getRegistro')->name('getRegistro');

//mostrar consultas
Route::get('/mostrar', 'App\Http\Controllers\PersonasController@index')->name('getMostrar');
//mostrar para editar
Route::get('/editar/{id}', 'App\Http\Controllers\PersonasController@edit')->name('getEditar');
//mostrar Personas y casar
Route::get('/mostrarPersonas', 'App\Http\Controllers\PersonasController@mostrarPersonas')->name('getMostrarPersonas');


//mmetodo para poder borrar
Route::delete('/eliminar/{id}', 'App\Http\Controllers\PersonasController@destroy')->name('eliminar');
//metodos para guardar
Route::post('guardar', [PersonasController::class, 'store'])->name('guardar');

//metodos para modificar

Route::put('/modificar/{id}', [PersonasController::class, 'update'])->name('modificar');
//Route::put('modificar/{id}', [PersonasController::class, 'update'])->name('modificar');


///////////////////////////////////metodo para agregar

//crear matrimonio
Route::get('/matrimonio/{id}', 'App\Http\Controllers\PersonasController@mostrarMujeres')->name('getMostrarMujeres');
//ruta para mostrar a la mujer
Route::get('/matrimonioM/{id}', 'App\Http\Controllers\PersonasController@getMatrimonioMujer')->name('getMujeres');

Route::get('/matrimonioC/{id}', 'App\Http\Controllers\ComprometidosController@getCrearMatrimonio')->name('getCrearMatrimonio');

//metdo para buscar y comprometer pst
Route::post('/comprometer',[ComprometidosController::class,'comprometer'])->name('comprometer');
//metodo para guardar los comprometidos
//metodos para guardar
Route::post('guardarComprometidos', [ComprometidosController::class, 'store'])->name('guardarComprometidos');

//mostrar los matrimonios
Route::get('/mostrarMatrimonios', 'App\Http\Controllers\ComprometidosController@mostrarMatrimonios')->name('getMostrarMatrimonios');

//metdo para comprometido por Clave
Route::post('/comprometidosBuscar',[ComprometidosController::class,'getBuscarCompre'])->name('getBuscarCompre');

//ruta para poder Hacer el divorcio
Route::get('/divorcio/{id}/{nombre}/{apellidoP}/{nombreM}/{apellidoPM}', 'App\Http\Controllers\ComprometidosController@divorcio')->name('getDivorcio');


//rutaas para el selecdinamico
Route::get('/select2-autocomplete', [ComprometidosController::class, 'ajaxdata'])->name('select2-autocomplete');
Route::get('/select2-autocomplet', [ComprometidosController::class, 'ajaxdataa'])->name('select2-autocomplet');

//mostrar historial de los matrimonios
Route::get('/mostrarHistorialMatrimonios', 'App\Http\Controllers\ComprometidosController@mostrarHistorialMatrimonios')->name('getMostrarHitorialMatrimonios');
//select en historial
Route::get('/select2-autocompletar', [ComprometidosController::class, 'ajaxdataSelect'])->name('select2-autocompletar');
