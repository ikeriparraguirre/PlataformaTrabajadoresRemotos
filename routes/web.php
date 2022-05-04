<?php

use App\Models\Archivo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ArchivosController;
use App\Http\Controllers\CalendarioController;

/* Especificamos las rutas de nuestro sitio web y despues con el middleware especificamos si pueden acceder los logeados o no logeados. */

Route::get('/', function () {
    return view('login');
})->middleware('guest');
Route::get('/archivos', function () {
    return view('archivos');
})->middleware('auth');
Route::get('/registro', function () {
    return view('registro');
})->middleware('guest');
Route::get('/subir', function () {
    return view('subir');
})->middleware('auth');
Route::get('/cerrarSesion', [UsuarioController::class, 'cerrarSesion'])->name('cerrarSesion.cerrarSesion')->middleware('auth');
Route::get('/calendario', function(){
    return view('calendario');
})->middleware('auth');
Route::get('/añadirActividad', function(){
    return view('añadirActividad');
})->middleware('auth');

/* Especificamos que metodos ejecuta el POST de cada pagina. */
Route::post('/', [UsuarioController::class, 'crearSesion'])->name('crearSesion');
Route::post('/registro', [UsuarioController::class, 'registrarUsuario'])->name('registro.registrarUsuario');
Route::post('/subir', [ArchivosController::class, 'subirArchivo']);
Route::post('/archivos', [ArchivosController::class, 'leerArchivos']);
Route::post('/calendario', [CalendarioController::class, 'verActividades']);
Route::post('/añadirActividad', [CalendarioController::class, 'añadirActividad']);