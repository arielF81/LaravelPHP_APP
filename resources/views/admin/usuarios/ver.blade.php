<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Noticia[] $usuarios */
?>

@extends('layouts.admin2')
@section('title', 'Detalle', )
@section('main')
    <h2 class="mt-5 mb-5">Perfil de Usuario</h2>
    <h3 class="fs-4">Nombre: {{ $usuario->nombre }}</h3>
    <div>
        @if($usuario->admin)
                <span class="badge bg-primary">Administrador</span>
        @else
            <span class="badge bg-success ">Usuario Común</span>
        @endif
    </div>
    <h3 class="fs-4">Email: {{ $usuario->email }}</h3>

    <h4 class="fs-4 mt-5">Servicios</h4>

    @if($usuario->servicios->isNotEmpty())
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Detalle</th>
            <th>Precio</th>
        </tr>
        </thead>
        <tbody>

        @foreach($usuario->servicios as $servicio)
            <tr>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->descripcion }}</td>
                <td>${{ $servicio->precio }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        Sin Servicios contratados.
    @endif

@endsection
