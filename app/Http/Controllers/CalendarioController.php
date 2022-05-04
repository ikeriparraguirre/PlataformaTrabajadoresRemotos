<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarioController extends Controller
{

    /**
     * 
     * Funcion que devuelve todas las actividades del usuario.
     * @return Array Todas las actividades del usuario.
     * 
     */

    public function verActividades()
    {
        $idUsuario = auth()->user()->id;
        if (!is_null($idUsuario) && trim($idUsuario)) {
            return DB::table('calendario')->where('idusuario', $idUsuario)->get();
        }
    }


    /**
     * 
     * Funcion para añadir una actividad a la base de datos.
     * Se comprueban si el nombre de la actividad la descripcion y la fecha
     * son correctas y si es asi se añade la actividad a la base de datos y redirige
     * a la pagina indicando que la actividad se ha añadido correctamente.
     * Si ha habido algun error se redirige a la pagina indicando que ha habido un error.
     * @param Request la solicitud con los datos de la actividad.
     * @return redireccion a la pagina con el mensaje.
     */

    public function añadirActividad(Request $request)
    {
        $nombre = $request->actividad;
        $descripcion = $request->descripcion;
        $fecha = $request->fecha;
        $idUsuario = auth()->user()->id;
        if (trim($nombre) != "" && !is_null($nombre)) {
            if (trim($descripcion) != "" && !is_null($descripcion)) {
                if (trim($fecha) != "" && !is_null($fecha)) {
                    DB::insert("INSERT INTO calendario VALUES('0', $idUsuario, '$nombre', '$descripcion', '$fecha')");
                    return redirect()->to('/añadirActividad')->with('añadido-correctamente', 'Se ha añadido la actividad correctamente.');
                } else {
                    return redirect()->to('/añadirActividad')->with('error-fecha', "La fecha es incorrecta");
                }
            } else {
                return redirect()->to('/añadirActividad')->with('error-descripcion', "La descripcion es incorrecta.");
            }
        } else {
            return redirect()->to('/añadirActividad')->with('error-nombre', "Nombre de la actividad incorrecto.");
        }
    }
}
