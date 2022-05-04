<!doctype html>
<html lang="es">

<head>
    <title>Añadir Actividad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('style-calendario.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
    <link rel="icon" href="{{ URL::asset('images/logo_tasiva.png') }}">
</head>

<body>
    <a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva-añadir-actividad"></a>
    <div class="añadir-actividad">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="heading-section">Añadir Actividad</h2>
            </div>
        </div>
        <form method="POST">
            @csrf
            <div class="actividad">
                <input type="text" name="actividad" class="form-control" id="actividad" aria-describedby="actividad" placeholder="Nombre de la actividad">
                <textarea name="descripcion" rows="5" placeholder="Descripcion" class="descripcion"></textarea>
                <input type="date" name="fecha" class="form-control" id="fecha" aria-describedby="fecha">
                <button type="submit" name="añadir-actividad" class="btn btn-primary btn-añadir-actividad mt-4"><i class="bi bi-plus-circle"></i></button>
            </div>
        </form>
        {{-- Se comprueba si hay algun mensaje de error y si es asi se muestra el mensaje. --}}
        @if(session()->has('añadido-correctamente'))
        <div class="alert alert-success w-30 mensaje-actividad" role="alert">{{ session()->get('añadido-correctamente') }}</div>
        @endif
        {{-- Se comprueba si hay algun mensaje de error y si es asi se muestra el mensaje. --}}
        @if(session()->has('error-nombre'))
        <div class="alert alert-danger mensaje-actividad" role="alert">{{ session()->get('error-nombre') }}</div>
        @endif
        {{-- Se comprueba si hay algun mensaje de error y si es asi se muestra el mensaje. --}}
        @if(session()->has('error-descripcion'))
        <div class="alert alert-danger mensaje-actividad" role="alert">{{ session()->get('error-descripcion') }}</div>
        @endif
        {{-- Se comprueba si hay algun mensaje de error y si es asi se muestra el mensaje. --}}
        @if(session()->has('error-fecha'))
        <div class="alert alert-danger mensaje-actividad" role="alert">{{ session()->get('error-fecha') }}</div>
        @endif
        {{-- Se comprueba si hay algun mensaje de error y si es asi se muestra el mensaje. --}}
        @if(session()->has('error-añadir'))
        <div class="alert alert-danger mensaje-actividad" role="alert">{{ session()->get('error-añadir') }}</div>
        @endif
    </div>
    <div class="navbar-calendario">
        <div class="text-center botones">
            <div class="primero">
                <a href="{{ url('/subir') }}"><i class="bi bi-cloud-arrow-up subir"></i></a>
            </div>
            <div class="segundo">
                <a href="{{ url('/archivos') }}"><i class="bi bi-cloud-arrow-down-fill archivos"></i></a>
            </div>
            <div class="tercero">
                <a href="{{ url('/calendario') }}"><i class="bi bi-calendar-check actual"></i></a>
            </div>
            <div class="cuarto">
                <a href="{{ route('cerrarSesion.cerrarSesion') }}"><i class="bi bi-x cerrar-sesion"></i></a>
            </div>
        </div>
    </div>

</body>
<script>
    //Para colocar en el input date por defecto la fecha de hoy.
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });
    document.getElementById('fecha').value = new Date().toDateInputValue();
</script>

</html>