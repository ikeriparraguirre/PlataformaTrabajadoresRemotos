<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuario = User::all();
        return view('login', ['usuario' => $usuario]);
    }
    public function devolverUsuario(Request $request)
    {
    }
    public function devolverContraseña(Request $request)
    {
    }
    public function registrarUsuario(Request $request)
    {
    }
}
