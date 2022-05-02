<?php

namespace App\Http\Controllers;

use Dotenv\Parser\Value;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use ValueError;

class ArchivosController extends Controller
{
    public function subirArchivo()
    {
        //$fileLocation = $_FILES['archivo']['tmp_name'];
        //$filename = $file['name'];
        //$newFileName = "newFileName.jpg";
        //Para descargarlo en el ordenador.
        //move_uploaded_file($fileLocation, "C:/xampp/htdocs" . $newFileName);
        $archivo = $_FILES['archivo'];
        $tipoArchivo = $archivo['type'];
        $file = $_FILES['archivo'];
        $nombreArchivo = $_POST['nombre-archivo'];
        $existeArchivo = count(DB::table('files')->where('nombre', 'like', "$nombreArchivo")->get());
        //Para que si no se ha subido ningun archivo no de un ValueError, si da un valueError redirecciona de nuevo a la pagina con el mensaje de error.
        if ($nombreArchivo != "" || is_null($nombreArchivo)) {
            if ($existeArchivo == 0) {
                try {
                    $convert_to_base64 = base64_encode(file_get_contents($file['tmp_name']));
                    $base64_image = "data:$tipoArchivo;base64," . $convert_to_base64;

                    //Para convertirlo a blob. No hace falta ya que de por si la base de datos lo guarda en blob. Si hacemos esto se codifica y luego hay que decodificarlos.
                    /*$fp = fopen($base64_image, "archivo");
        $contenido = fread($fp, $_FILES["archivo"]["size"]);
        $contenido = addslashes($contenido);
        fclose($fp);*/

                    //Para sacar la hora actual
                    date_default_timezone_set('Europe/Madrid');
                    $date = date('Y-m-d H:i:s');
                    /*try {
                    //Para subir a la base de datos.
                    DB::insert("INSERT INTO files VALUES('0', '$nombreArchivo', '$base64_image', '$date')");
                    //PARA HACER SI HAY ALGUN ERROR.
                    //redirect()->to('/subir')->with('errorSubida', "Error al subir un archivo al servidor.");
                    return redirect()->to('/subir')->with('message', "Archivo subido al servidor correctamente.");
                } catch (\Throwable $th) {
                    return redirect()->to('/subir')->with('errorSubida', "Error al subir el archivo. Archivo no valido.");
                }*/
                } catch (ValueError $ve) {
                    return redirect()->to('/subir')->with('errorSubida', "Error al subir el archivo al servidor.");
                }
            } else {
                return redirect()->to('/subir')->with('errorSubida', "Ya existe un archivo con este nombre en el servidor.");
            }
        } else {
            return redirect()->to('/subir')->with('errorSubida', "Nombre del archivo no valido.");
        }


        //return "<img src=" . $base64_image . "></img>";
    }

    public function leerArchivos()
    {
        //Para leer todos los archivos de la base de datos que contengan en el nombre lo que se ha buscado.
        $busqueda = $_POST['busqueda'];
        $resultado = DB::table('files')->where('nombre', 'like', "%$busqueda%")->get();
        $arrayResultados = array();
        $cadaArchivo = array();
        for ($i = 0; $i < $resultado->count(); $i++) {
            $cadaArchivo['nombre'] = $resultado[$i]->nombre;
            $cadaArchivo['archivo'] = $resultado[$i]->archivo;
            $cadaArchivo['tipo'] = explode('/', $resultado[$i]->archivo)[0];
            array_push($arrayResultados, $cadaArchivo);
        }
        if (count($arrayResultados) > 0) {
            return redirect()->to('/archivos')->with('arrayResultados', $arrayResultados);
        } else {
            return redirect()->to('/archivos')->with('errorSinArchivos', 'No se ha encontrado ningún archivo.');
        }
    }
}
