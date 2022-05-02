<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Subir archivos</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Para que cree y encuentre la ruta del style.css -->
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
    <link rel="icon" href="{{ URL::asset('images/logo_tasiva.png') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="subir-archivos">
        <div class="logo-archivos text-center">
            <img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva-archivos" alt="logotipo de la empresa Tasiva Vision">
        </div>
        <form method="POST" class="formulario-subir" enctype="multipart/form-data">
            @csrf
            <div class="borde-subir-archivos" draggable="true">
                <label for="file-input" class="label-input">
                    <i class="bi bi-file-earmark-arrow-up"></i>
                </label>
                <input type="file" name="archivo" class="input-file" id="file-input">
            </div>
            <div class="nombre-archivo">
                <label for="nombre-archivo">Nombre</label>
                <input type="text" name="nombre-archivo" class="form-control" id="nombre-archivo" aria-describedby="Nombre del archivo">
            </div>
            <div class="boton-subir">
                <button type="submit" class="subir">
                    <div class="icono-texto-subir">
                        <i class="bi bi-cloud-upload"></i>
                        <p class="texto-btn-subir">Subir</p>
                    </div>
                </button>
            </div>
            <div class="estado-archivo">
                @if(session()->has('message'))
                <div class="alert alert-success correcto" role="alert">{{ session()->get('message') }}</div>
                @endif
                @if(session()->has('errorSubida'))
                <div class="alert alert-danger error" role="alert">{{ session()->get('errorSubida') }}</div>
                @endif
            </div>
        </form>
        <div class="navbar-subir">
            <div class="text-center botones">
                <div class="primero">
                    <a href="{{ url('/subir') }}"><i class="bi bi-cloud-arrow-up actual"></i></a>
                </div>
                <div class="segundo">
                    <a href="{{ url('/archivos') }}"><i class="bi bi-cloud-arrow-down-fill archivos"></i></a>
                </div>
                <div class="tercero">
                    <a href="{{ route('cerrarSesion.cerrarSesion') }}"><i class="bi bi-x cerrar-sesion"></i></a>
                </div>
            </div>
        </div>
        <!-- <div class="cerrar-sesion">
            <div class="alert alert-success" role="alert">
                {{ Auth::user() }}
            </div>
            @error('message')
            <p class="text-danger">Error</p>
            @enderror
            {{ Auth::user() }}
            <a href="{{ route('cerrarSesion.cerrarSesion') }}">Cerrar sesion</a>
        </div>
    </div>-->
        <!-- <a href="{{ route('cerrarSesion.cerrarSesion') }}">Cerrar sesion</a> -->
</body>
<script src="{{ URL::asset('script.js') }}"></script>

</html>