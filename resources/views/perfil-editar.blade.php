<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */

?>

@extends('layouts.main')
@section('title', 'Editar ')
@section('main')
    <h2>Editar {{ $usuario->nombre }} </h2>


    <form action="{{ route('prefil/editar/ejecutar', ['id' => $usuario->usuario_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control"

                   value="{{ old('nombre', $usuario->nombre) }}"
            >
            @error('nombre')
            <div class="text-danger" id="error-nombre" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control"

                   value="{{ old('email', $usuario->email) }}"
            >
            @error('email')
            <div class="text-danger" id="error-email" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>




@endsection
