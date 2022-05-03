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
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
    <link rel="icon" href="{{ URL::asset('images/logo_tasiva.png') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="archivos">
        <div class="logo-archivos text-center">
            <a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva-archivos" alt="logotipo de la empresa Tasiva Vision"></a>
        </div>
        <div class="buscador">
            <form method="POST">
                @csrf
                <input type="search" id="buscador" name="busqueda" class="form-control" placeholder="Buscar aquí..." aria-label="Search" />
            </form>
        </div>
        <div class="fondo-marron">
            <div class="titulo">
                <h1 class="resultados">Resultados:</h1>
            </div>
            <div class="resultados-busqueda">
                @if(session()->has('arrayResultados'))
                @for($i = 0; $i< count(session()->get('arrayResultados')); $i++)
                    <div class="resultado">
                        <div class="imagen-resultado">
                            @if(session()->get('arrayResultados')[$i]['tipo'] == 'data:image')
                            <img src="{{ session()->get('arrayResultados')[$i]['archivo'] }}" class="resultado-imagen">
                            @else
                            <i class="bi bi-file-code"></i>
                            @endif
                        </div>
                        <div class="text-center nombre-descargar">
                            <div class="nombre-movimiento">
                                <p class="nombreArchivo">{{ session()->get('arrayResultados')[$i]['nombre'] }}</p>
                            </div>
                            <a href="{{ session()->get('arrayResultados')[$i]['archivo'] }}" download="{{ session()->get('arrayResultados')[$i]['nombre'] }}"><i class="bi bi-download"></i></a>
                        </div>
                    </div>

                    @endfor
                    @endif
                    @if(session()->has('errorSinArchivos'))
                    <h3>{{ session()->get('errorSinArchivos') }}</h3>
                    @endif
            </div>
        </div>
        <div class="navbar">
            <div class="text-center botones">
                <div class="primero">
                    <a href="{{ url('/subir') }}"><i class="bi bi-cloud-arrow-up subir"></i></a>
                </div>
                <div class="segundo">
                    <a href="{{ url('/archivos') }}"><i class="bi bi-cloud-arrow-down-fill actual"></i></a>
                </div>
                <div class="tercero">
                    <a href="{{ route('cerrarSesion.cerrarSesion') }}"><i class="bi bi-x cerrar-sesion"></i></a>
                </div>
            </div>
        </div>
</body>

</html>