<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function registrarUsuario()
    {
        $customMessages = [
            'required' => 'Este campo es obligatorio.',
            'email' => 'Este campo debe ser un email.',
            'confirmed' => 'Las contraseñas no coinciden.'
        ];
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ], $customMessages);
        $usuario = User::create(request(['name', 'email', 'password']));
        Auth::login($usuario);
        return redirect()->to('/archivos');
    }

    public function crearSesion()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o la contraseña no son correctas.'
            ]);
        } else {
            return redirect()->to('/archivos');
        }
    }

    public function cerrarSesion()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
