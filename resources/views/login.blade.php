<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesion</title>

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
    <div class="col-sm-6 formulario">
        <div class="logo text-center">
            <a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva" alt="logotipo de la empresa Tasiva Vision"></a>
        </div>
        <div class="iniciar-sesion">
            <form method="POST" class="formulario-inicio-sesion">
                @csrf
                <div class="form-group">
                    <label for="correo-electronico">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" id="correo-electronico" aria-describedby="Correo electronico">
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="contraseña">
                </div>
                {{-- Se comprueba si hay un mensaje incorrecto y si es asi se muestra el mensaje. --}}
                @error('message')
                <div class="alert alert-danger m-2 mensaje-error" role="alert">Correo electrónico o contraseña incorrecta.</div>
                @enderror
                <div class="form-group text-center registrarse">
                    <a href="registro" class="link-primary btn-registrarse">Registrarse</a>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-iniciar-sesion"><i class="bi bi-caret-right"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-6 imagen">
    </div>
</body>

</html>