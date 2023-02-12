<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */

?>

@extends('layouts.main')
@section('title', 'Login')
@section('main')
    <h2>Iniciar Sesión</h2>
    <form action="{{ route('auth/login/ejecutar') }}" method="post" class="mb-2">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                class="form-control"
            >

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
            >

        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>



@endsection
