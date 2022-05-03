<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarioController extends Controller
{

    public function verActividades()
    {
        $idUsuario = auth()->user()->id;
        if (!is_null($idUsuario) && trim($idUsuario)) {
            return DB::table('calendario')->where('idusuario', $idUsuario)->get();
        }
    }

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
            return redirect()->to('/añadirActividad')->with('error-nombre', "El nombre de la actividad es incorrecto.");
        }
    }
}
