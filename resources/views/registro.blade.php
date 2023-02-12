<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */

?>

@extends('layouts.main')
@section('title', 'Registro')
@section('main')
    <h2>
        Registro
    </h2>
    <form action="registro" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                class="form-control"
            >
            @error('nombre')
            <div class="text-danger" id="error-nombre" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
            >
            @error('email')
            <div class="text-danger" id="error-email" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
            >
            @error('password')
            <div class="text-danger" id="error-password" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
