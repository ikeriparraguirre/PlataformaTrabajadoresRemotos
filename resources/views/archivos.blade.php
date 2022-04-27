@extends('layouts.app')
@section('content')
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
@endsection