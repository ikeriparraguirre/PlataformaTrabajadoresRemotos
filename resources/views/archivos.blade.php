<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archivos</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
    <link rel="icon" href="{{ URL::asset('images/logo_tasiva.png') }}">

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
                {{-- Se comprueba si hay algun mensaje y si es asi se muestra el mensaje. --}}
                <div class="alert alert-success eliminar-archivo-correctamente" role="alert">{{ session()->get('eliminar-archivo-correctamente') }}</div>
                {{-- Se comprueba si hay algun mensaje de error y si es asi se muestra el mensaje. --}}
                <div class="alert alert-danger error-eliminar-archivo" role="alert">{{ session()->get('error-eliminar-archivo') }}</div>
                {{-- Se comprueba si existe algun resultado. --}}
                @if(session()->has('arrayResultados'))
                {{-- Se recorre cada elemento del array. --}}
                @for($i = 0; $i< count(session()->get('arrayResultados')); $i++)
                    <div class="resultado archivo{{ session()->get('arrayResultados')[$i]['id'] }}">
                        <button type="button" class="modal-archivos" data-toggle="modal" data-target="#archivo{{ session()->get('arrayResultados')[$i]['id'] }}">
                            <div class="imagen-resultado">
                                {{-- Si el tipo es 'data:image' se muestra la imagen. --}}
                                @if(session()->get('arrayResultados')[$i]['tipo'] == 'data:image')
                                <img src="{{ session()->get('arrayResultados')[$i]['archivo'] }}" class="resultado-imagen">
                                @else
                                {{-- Si el tipo no es 'data:image' se muestra un icono de un archivo. --}}
                                <i class="bi bi-file-code"></i>
                                @endif
                            </div>
                        </button>
                        <div class="text-center nombre-descargar">
                            <div class="nombre-movimiento">
                                {{-- Se indica el nombre del archivo. --}}
                                <p class="nombreArchivo">{{ session()->get('arrayResultados')[$i]['nombre'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="archivo{{ session()->get('arrayResultados')[$i]['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">{{ session()->get('arrayResultados')[$i]['nombre'] }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- Si el tipo es 'data:image' se muestra la imagen. --}}
                                    @if(session()->get('arrayResultados')[$i]['tipo'] == 'data:image')
                                    <img src="{{ session()->get('arrayResultados')[$i]['archivo'] }}" class="resultado-imagen">
                                    @else
                                    {{-- Si el tipo no es 'data:image' se muestra un icono de un archivo. --}}
                                    <h5 class="text-dark">Previsualización no disponible.</h5>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger mr-2 eliminar-archivo" name="{{ session()->get('arrayResultados')[$i]['id'] }}"><i class="bi bi-trash"></i></button>
                                    {{-- Se indica al enlace del icono de descarga un href el data del archivo y en el download el nombre del archivo que sera el nombre con que se descargue el archivo. --}}
                                    <a class="btn btn-primary mr-2" href="{{ session()->get('arrayResultados')[$i]['archivo'] }}" download="{{ session()->get('arrayResultados')[$i]['nombre'] }}"><i class="bi bi-download"></i></a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                    @endif
                    {{-- Si hay algun error se muestra el mensaje de error. --}}
                    @if(session()->has('errorSinArchivos'))
                    <h3>{{ session()->get('errorSinArchivos') }}</h3>
                    @endif
            </div>
        </div>
        <div class="navbar">
            <div class="text-center w-100 botones">
                <div class="primero">
                    <a href="{{ url('/subir') }}"><i class="bi bi-cloud-arrow-up subir"></i></a>
                </div>
                <div class="segundo">
                    <a href="{{ url('/archivos/all') }}"><i class="bi bi-cloud-arrow-down-fill actual"></i></a>
                </div>
                <div class="tercero">
                    <a href="{{ url('/calendario') }}"><i class="bi bi-calendar-check calendario"></i></a>
                </div>
                <div class="cuarto">
                    <a href="{{ route('cerrarSesion.cerrarSesion') }}"><i class="bi bi-x cerrar-sesion"></i></a>
                </div>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script>
    window.addEventListener('load', function() {
        //Se capturan todos los botones de eliminar.
        let botonesEliminar = document.querySelectorAll(".eliminar-archivo");
        //Se recorren todos los botones de eliminar.
        for (let i = 0; i < botonesEliminar.length; i++) {
            //Si se clicka sobre un boton de eliminar.
            botonesEliminar[i].addEventListener('click', function() {
                //Se crea la solicitud ajax.
                let url = '{{ url("/archivos") }}';
                let idArchivo = botonesEliminar[i].getAttribute("name");
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                    },
                    type: 'POST',
                    url: url,
                    data: {
                        consulta: "eliminar-archivo",
                        id: parseInt(idArchivo)
                    }
                }).done(function(res) {
                    //Se oculta el modal.
                    $("#archivo" + botonesEliminar[i].getAttribute("name")).modal('hide');
                    //Si la respuesta es que el archivo se ha eliminado correctamente.
                    if (res == "Archivo eliminado correctamente.") {
                        //Se recoge el div del mensaje correcto y se muestra el mensaje.
                        let eliminadoCorrectamente = document.querySelector(".eliminar-archivo-correctamente");
                        eliminadoCorrectamente.style.display = "block";
                        eliminadoCorrectamente.innerText = "Archivo eliminado correctamente.";
                        //Se elimina el resultado del DOM.
                        document.querySelector(".archivo" + botonesEliminar[i].getAttribute("name")).remove();
                    } else if (res == "Error al eliminar el archivo.") {
                        //Si la respuesta es que ha habido algun error.
                        //Se recoge el div del mensaje de error y se muestra el mensaje.
                        let eliminadoError = document.querySelector(".error-eliminar-archivo");
                        eliminadoError.style.display = "block";
                        eliminadoError.innerText = "Error al eliminar el archivo.";
                    }

                    //Se oculta en mensaje de error o correcto despues de 5 segundos.
                    setTimeout(function() {
                        //Si el mensaje correcto esta mostrado se oculta.
                        if (document.querySelector(".eliminar-archivo-correctamente").innerText != "") {
                            document.querySelector(".eliminar-archivo-correctamente").style.display = "none";
                        }
                        //Si el mensaje de error esta mostrado se oculta.
                        if (document.querySelector(".error-eliminar-archivo").innerText != "") {
                            document.querySelector(".error-eliminar-archivo").style.display = "none";
                        }
                    }, 5000);
                })
            })
        }
    });
</script>

</html>