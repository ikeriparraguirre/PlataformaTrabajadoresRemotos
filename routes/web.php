<?php

use App\Models\Archivo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
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

/*
Route::get('/', function () {
    return view('welcome');
});*/

/* Especificamos las rutas de nuestro sitio web y despues con el middleware especificamos si pueden acceder los logeados o no logeados. */
Route::get('/', function(){
    return view("login");
})->middleware('guest');
Route::get('/archivos', function(){
    return view('archivos');
})->middleware('auth');
Route::get('/registro', function(){
    return view('registro');
})->middleware('guest');
Route::get('/subir', function(){
    return view('/subir');
})->middleware('auth');

/* Para que al clickar sobre el link de cambiar pagina redireccione a la pagina de subir. */
Route::get("/subir='yes'", function(){
    return redirect()->to("/subir");
});

Route::post('/', [UsuarioController::class, 'crearSesion'])->name('crearSesion');
Route::post('/registro', [UsuarioController::class, 'registrarUsuario'])->name('registro.registrarUsuario');
Route::get('/cerrarSesion', [UsuarioController::class, 'cerrarSesion'])->name('cerrarSesion.cerrarSesion');