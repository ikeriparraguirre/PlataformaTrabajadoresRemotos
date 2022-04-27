<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function registrarUsuario()
    {
        //Completar el validate para que solo sea valido si las dos contraseñas son las mismas.
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmar-password' => 'required'
        ]);
        $usuario = User::create(request(['name', 'email', 'password']));
        Auth::login($usuario);
        return redirect()->to('/archivos');
    }

    public function crearSesion(){
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o la contraseña no son correctas.'
            ]);
        }
        else{
            return redirect()->to('/archivos');
        }
    }

    public function cerrarSesion(){
        auth()->logout();
        return redirect()->to('/');
    }
}
