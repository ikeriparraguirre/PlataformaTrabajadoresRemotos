@extends('layouts.app')
@section('content')
<div class="container">
    <div class="logo">
        <img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva" alt="logotipo de la empresa Tasiva Vision">
    </div>
    <div class="iniciar-sesion">
        <form class="formulario-inicio-sesion">
            <div class="form-group">
                <label for="nombre-usuario">Nombre de usuario</label>
                <input type="email" class="form-control" id="nombre-usuario" aria-describedby="Nombre de usuario">
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" class="form-control" id="contraseña">
            </div>
            <div class="form-group resgistrarse">
                <a href="#" class="link-primary registrarse">Registrarse</a>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-right"></i></button>
        </form>
    </div>
</div>
@endsection