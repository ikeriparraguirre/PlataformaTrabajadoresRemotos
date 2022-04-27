@extends('layouts.app')
@section('content')
<div class="container">
    <div class="logo">
        <img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva" alt="logotipo de la empresa Tasiva Vision">
    </div>
    <div class="iniciar-sesion">
        <form method="POST" class="formulario-inicio-sesion">
            @csrf
            <div class="form-group">
                <label for="nombre-usuario">Correo electronico</label>
                <input type="email" name="email" class="form-control" id="correo-electronico" aria-describedby="Correo electronico">
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="password" class="form-control" id="contraseña">
            </div>
            @error('message')
            <div class="alert alert-danger m-2" role="alert">Correo electronico o contraseña incorrecta.</div>
            @enderror
            <div class="form-group resgistrarse">
                <a href="#" class="link-primary registrarse">Registrarse</a>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-right"></i></button>
        </form>
        {{ Auth::user() }}
    </div>
</div>
@endsection