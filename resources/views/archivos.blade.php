<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Archivos</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/style.css">
    <!-- Para que cree y encuentre la ruta del style.css -->
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
    <link rel="icon" href="{{ URL::asset('images/logo_tasiva.png') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="col-sm-6 formulario">
        <div class="logo-archivos text-center">
            <img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva-archivos" alt="logotipo de la empresa Tasiva Vision">
        </div>
        <div class="buscador">
            <input type="search" id="buscador" class="form-control" placeholder="Buscar aquí..." aria-label="Search" />
        </div>
        <div class="fondo-marron">
            <div class="titulo">
                <h4 class="resultados">Resultados:</h4>
            </div>
            <div class="col-5 columna1">
                <div class="resultado">
                    <div class="imagen-resultado">
                        <img src="{{ URL::asset('images/foto_camara.jpg') }}" class="resultado-imagen">
                    </div>
                    <div class="text-center nombre-descargar">
                        <div class="nombre-movimiento">
                            <p class="nombreArchivo">Foto camara</p>
                        </div>
                        <i class="bi bi-download"></i>
                    </div>
                </div>
            </div>
            <div class="col-5 columna2">
                <div class="resultado">
                    <div class="imagen-resultado">
                        <img src="{{ URL::asset('images/foto_camara.jpg') }}" class="resultado-imagen">
                    </div>
                    <div class="nombre-descargar">
                        <div class="nombre-movimiento">
                            <p class="text-center nombreArchivo">I_511454546Interr_Plata_Circular_02_</p>
                        </div>
                        <i class="bi bi-download"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="cerrar-sesion">
            <div class="alert alert-success" role="alert">
                {{ Auth::user() }}
            </div>
            <!-- @error('message')
            <p class="text-danger">Error</p>
            @enderror
            {{ Auth::user() }} -->
            <a href="{{ route('cerrarSesion.cerrarSesion') }}">Cerrar sesion</a>
        </div>
    </div>
    <!-- <a href="{{ route('cerrarSesion.cerrarSesion') }}">Cerrar sesion</a> -->
</body>

</html>