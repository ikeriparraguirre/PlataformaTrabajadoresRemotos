@extends('layouts.app')
@section('content')
<div class="container">
    <div class="logo">
        <img src="{{ URL::asset('images/logo_tasiva.png') }}" class="logo-tasiva" alt="logotipo de la empresa Tasiva Vision">
    </div>
    <div class="registro">
        <form method="POST" class="formulario-registro">
            @csrf
            <div class="form-group">
                <label for="correo-electronico">Nombre</label>
                <input type="text" name="name" class="form-control" id="nombre" aria-describedby="nombre">
            </div>
            @error('name')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="correo-electronico">Correo electronico</label>
                <input type="email" name="email" class="form-control" id="correo-electronico" aria-describedby="Correo electronico">
            </div>
            @error('email')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="password" class="form-control" id="contraseña">
            </div>
            @error('password')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="contraseña">Confirmar Contraseña</label>
                <input type="password" name="confirmar-password" class="form-control" id="contraseña">
            </div>
            @error('confirmar-password')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-right"></i></button>
        </form>
        {{ Auth::user() }}
    </div>
</div>
@endsection