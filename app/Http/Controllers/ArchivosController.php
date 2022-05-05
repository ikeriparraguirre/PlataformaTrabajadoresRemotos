<?php

namespace App\Http\Controllers;

use Dotenv\Parser\Value;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use ValueError;

class ArchivosController extends Controller
{

    /**
     * 
     * Funcion que comprueba si la consulta es para eliminar un archivo no.
     * Si la consulta es para eliminar un archivo se comprueba si la id es correcto.
     * 
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $consulta = $request->consulta;
        if ($consulta == "eliminar-archivo") {
            if (!is_null($id) && trim($id) != "") {
                try {
                    DB::delete("DELETE FROM files WHERE id = $id");
                    unset($request);
                    return "Archivo eliminado correctamente.";
                } catch (QueryException $th) {
                    return "Error al eliminar el archivo.";
                }
            } else {
                return redirect()->to('/archivos');
            }
        } else {
            $busqueda = $_POST['busqueda'];
            $resultado = DB::table('files')->where('nombre', 'like', "%$busqueda%")->get();
            $arrayResultados = array();
            $cadaArchivo = array();
            for ($i = 0; $i < $resultado->count(); $i++) {
                $cadaArchivo['nombre'] = $resultado[$i]->nombre;
                $cadaArchivo['archivo'] = $resultado[$i]->archivo;
                $cadaArchivo['tipo'] = explode('/', $resultado[$i]->archivo)[0];
                $cadaArchivo['id'] = $resultado[$i]->id;
                array_push($arrayResultados, $cadaArchivo);
            }
            if (count($arrayResultados) > 0) {
                return redirect()->to('/archivos')->with('arrayResultados', $arrayResultados);
            } else {
                return redirect()->to('/archivos')->with('errorSinArchivos', 'No se ha encontrado ningún archivo.');
            }
        }
    }

    /**
     * 
     * Funcion para subir un archivo un archivo al servidor.
     * Este metodo recoge el archivo que ha indicado el usuario, lo codifica en base64
     * y lo sube al servidor con el nombre indicado en el input.
     * Si hay algun error se redireccionara a la pagina de subir archivo indicando en un alert el mensaje de error.
     * Si el archivo se ha subido correctamente se redireccionara a la pagina de subir archivo indicando en un
     * alert que el archivo se ha subido correctamente.
     * @return redirecciona a la pagina con el mensaje.
     * 
     */

    public function subirArchivo()
    {
        $archivo = $_FILES['archivo'];
        $tipoArchivo = $archivo['type'];
        $file = $_FILES['archivo'];
        $nombreArchivo = $_POST['nombre-archivo'];
        $existeArchivo = count(DB::table('files')->where('nombre', 'like', "$nombreArchivo")->get());
        //Para que si no se ha subido ningun archivo no de un ValueError, si da un valueError redirecciona de nuevo a la pagina con el mensaje de error.
        if (trim($nombreArchivo) != "" || is_null($nombreArchivo)) {
            if ($existeArchivo == 0) {
                try {
                    $convert_to_base64 = base64_encode(file_get_contents($file['tmp_name']));
                    $base64_image = "data:$tipoArchivo;base64," . $convert_to_base64;

                    //Para sacar la hora actual
                    date_default_timezone_set('Europe/Madrid');
                    $date = date('Y-m-d H:i:s');
                    try {
                        DB::insert("INSERT INTO files VALUES('0', '$nombreArchivo', '$base64_image', '$date')");
                        return redirect()->to('/subir')->with('message', "Archivo subido al servidor correctamente.");
                    } catch (\Throwable $th) {
                        return redirect()->to('/subir')->with('errorSubida', "Error al subir el archivo. Archivo no valido.");
                    }
                } catch (ValueError $ve) {
                    return redirect()->to('/subir')->with('errorSubida', "Error al subir el archivo al servidor.");
                }
            } else {
                return redirect()->to('/subir')->with('errorSubida', "Ya existe un archivo con este nombre en el servidor.");
            }
        } else {
            return redirect()->to('/subir')->with('errorSubida', "Nombre del archivo no valido.");
        }
    }


    /**
     * 
     * Funcion para leer los archivos del servidor.
     * Indicando el nombre en el input de buscar se comprueba si hay algun archivo en el servidor
     * que contenga la cadena indicada en el input, si es asi se genera un array por cada archivo indicando
     * el nombre, archivo y el tipo. Si el tipo es data:image se podra previsualizar la imagen, sino aparecera
     * un icono de un archivo.
     * Si no se ha encontrado ningún archivo se redireccionara a la pagina de archivos indicando que no se ha encontrado
     * ningun archivo.
     * Si se encuentra algun archivo se redireccionara a la pagina de archivos con el arrayResultados que seran todos los resultados
     * a mostrar en la pagina.
     * @return redirecciona a la pagina con el mensaje.
     * 
     */
    /*
    public function leerArchivos()
    {
        $busqueda = $_POST['busqueda'];
        $resultado = DB::table('files')->where('nombre', 'like', "%$busqueda%")->get();
        $arrayResultados = array();
        $cadaArchivo = array();
        for ($i = 0; $i < $resultado->count(); $i++) {
            $cadaArchivo['nombre'] = $resultado[$i]->nombre;
            $cadaArchivo['archivo'] = $resultado[$i]->archivo;
            $cadaArchivo['tipo'] = explode('/', $resultado[$i]->archivo)[0];
            $cadaArchivo['id'] = $resultado[$i]->id;
            array_push($arrayResultados, $cadaArchivo);
        }
        if (count($arrayResultados) > 0) {
            return redirect()->to('/archivos')->with('arrayResultados', $arrayResultados);
        } else {
            return redirect()->to('/archivos')->with('errorSinArchivos', 'No se ha encontrado ningún archivo.');
        }
    }*/


    /**
     * 
     * Funcion para devolver todos los archivos del servidor.
     * Esta funcion se ejecuta cuando se entra a la pagina archivos
     * y muestra todos los archivos que hay en el servidor.
     * @return redireccion junto con un array con todos los archivos.
     * 
     */

    public function devolverArchivos()
    {
        $resultado = DB::table('files')->where('nombre', 'like', "%%")->get();
        //return var_dump($resultado);
        $arrayResultados = array();
        $cadaArchivo = array();
        for ($i = 0; $i < $resultado->count(); $i++) {
            $cadaArchivo['nombre'] = $resultado[$i]->nombre;
            $cadaArchivo['archivo'] = $resultado[$i]->archivo;
            $cadaArchivo['tipo'] = explode('/', $resultado[$i]->archivo)[0];
            $cadaArchivo['id'] = $resultado[$i]->id;
            array_push($arrayResultados, $cadaArchivo);
        }
        if (count($arrayResultados) > 0) {
            return redirect()->to('/archivos')->with('arrayResultados', $arrayResultados);
        } else {
            return redirect()->to('/archivos')->with('errorSinArchivos', 'No se ha encontrado ningún archivo.');
        }
    }
}
