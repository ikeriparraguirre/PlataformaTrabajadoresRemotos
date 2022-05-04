<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarioController extends Controller
{


    /**
     * 
     * Funcion para comprobar si lo ha llamado el boton borrar o ver
     * actividades.
     * Si $request->consulta es eliminar se elimina la actividad.
     * Sino se devuelven todas las actividades del usuario.
     * @param request los datos pasados por Ajax.
     * @return mensaje si la actividad se ha eliminado correctamente.
     * @return consulta devuelve el resultado de la consulta.
     * 
     * 
     */

    public function index(Request $request)
    {
        if ($request->consulta == "eliminar") {
            $idUsuario = auth()->user()->id;
            $id = $request->id;
            DB::delete("DELETE FROM calendario WHERE idusuario = $idUsuario AND id = $id");
            unset($request);
            return "Actividad eliminada correctamente.";
        } else {
            $idUsuario = auth()->user()->id;
            if (!is_null($idUsuario) && trim($idUsuario)) {
                return DB::table('calendario')->where('idusuario', $idUsuario)->get();
            }
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
                    try {
                        DB::insert("INSERT INTO calendario VALUES('0', $idUsuario, '$nombre', '$descripcion', '$fecha')");
                        return redirect()->to('/añadirActividad')->with('añadido-correctamente', 'Se ha añadido la actividad correctamente.');
                    } catch (QueryException $qe) {
                        return redirect()->to('/añadirActividad')->with('error-añadir', 'No se ha podido añadir la actividad.');
                    }
                } else {
                    return redirect()->to('/añadirActividad')->with('error-fecha', "La fecha es incorrecta");
                }
            } else {
                return redirect()->to('/añadirActividad')->with('error-descripcion', "La descripcion es incorrecta.");
            }
        } else {
            return redirect()->to('/añadirActividad')->with('error-nombre', "Nombre de la actividad incorrecta.");
        }
    }
}
