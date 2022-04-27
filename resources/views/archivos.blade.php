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
    <div class="container">
        <div class="logo">
            <img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva" alt="logotipo de la empresa Tasiva Vision">
        </div>
        <div class="iniciar-sesion">
            <a href="{{ route('cerrarSesion.cerrarSesion') }}">Cerrar sesion</a>
            {{ Auth::user() }}
            @error('message')
            <p class="text-danger">Error</p>
            @enderror
            {{ Auth::user() }}
        </div>
    </div>
</body>

</html>