<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    /**
     * 
     * Funcion para registrar un nuevo usuario.
     * Primero se comprueban si todos los datos introducidos son correctos, si no es
     * asi se muestran los errores correspondientes.
     * Si no hay ningun error se crea un usuario y se introduce a la base de datos.
     * Por ultimo se redireccionara a la pagina de archivos.
     * @return redirecciona a la pagina con el mensaje.
     * 
     */

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
        return redirect()->to('/archivos/all');
    }


    /**
     * 
     * Funcion para crear la sesion.
     * Primero se comprueba si el correo electronico y la contraseña es correcto, si no
     * es asi se muestra un error.
     * Si es correcto se redirecciona a la pagina de archivos.
     * @return redirecciona a la pagina con el mensaje.
     * 
     */

    public function crearSesion()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o la contraseña no son correctas.'
            ]);
        } else {
            return redirect()->to('/archivos/all');
        }
    }


    /**
     * 
     * Funcion para cerrar la sesion.
     * Se elimina la sesion y redireccionara a la pagina de inicio.
     * @return redirecciona a la pagina con el mensaje.
     * 
     */
    
    public function cerrarSesion()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
