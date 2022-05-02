<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

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
        var_dump($file);
        var_dump($_POST);
        $convert_to_base64 = base64_encode(file_get_contents($file['tmp_name']));
        $base64_image = "data:$tipoArchivo;base64," . $convert_to_base64;

        //Para convertirlo a blob.
        $fp = fopen($base64_image, "archivo");
        $contenido = fread($fp, $_FILES["archivo"]["size"]);
        $contenido = addslashes($contenido);
        fclose($fp);

        //Para sacar la hora actual
        date_default_timezone_set('Europe/Madrid');
        $date = date('d-m-y h:i:s');
        echo $date;

        //Para subir a la base de datos.
        DB::insert("INSERT INTO files VALUES('0', '$nombreArchivo', '$contenido', '$date')");
        return redirect()->to('/subir')->with('message', "Archivo subido al servidor correctamente.");
        //return "<img src=" . $base64_image . "></img>";
    }

    public function leerArchivos(){
        //Para leer todos los archivos de la base de datos.
        $respuesta = DB::select("SELECT nombre, archivo FROM 'files'");
        return var_dump($respuesta);
    }

}
