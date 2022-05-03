<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registrarse</title>

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
        <div class="registro">
            <form method="POST" class="formulario-registro">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" class="form-control" id="nombre" aria-describedby="nombre">
                </div>
                @error('name')
                <div class="alert alert-danger mensaje-error" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="correo-electronico">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" id="correo-electronico" aria-describedby="Correo electronico">
                </div>
                @error('email')
                <div class="alert alert-danger mensaje-error" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="contraseña">
                </div>
                @error('password')
                <div class="alert alert-danger mensaje-error" role="alert">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="confirmar-contraseña">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" id="confirmar-contraseña">
                </div>
                @error('confirmar-password')
                <div class="alert alert-danger mensaje-error" role="alert">{{ $message }}</div>
                @enderror
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-registrarse"><i class="bi bi-caret-right"></i></button>
                </div>
            </form>
            {{ Auth::user() }}
        </div>
    </div>
    <div class="col-sm-6 imagen">
</body>

</html>