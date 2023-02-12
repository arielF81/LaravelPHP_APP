<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Noticia[] $usuarios */
?>


@extends('layouts.main')
@section('title', 'Perfil')
@section('main')
    <h2>
        Mis Datos &#128203;
    </h2>
    <h3 class="fs-4">Nombre: {{ $usuario->nombre }}</h3>
    <div>
        @if($usuario->admin)
            <span class="badge bg-primary">Administrador</span>
        @else
            <span class="badge rounded-pill bg-secondary">Nro.Cliente: {{ $usuario->usuario_id }}</span>
        @endif
    </div>
    <h3 class="fs-4">Email: {{ $usuario->email }}</h3>
    <a href="{{ route('perfil-editar', ['id' => $usuario->usuario_id]) }}" class="btn btn-warning">Editar Perfil</a>

    <h4 class="fs-4 mt-5">Mis Servicios
        @if($usuario->servicios->isNotEmpty())
            &#128570;

        @endif
    </h4>

    @if($usuario->servicios->isNotEmpty())

        <a href="{{ route('servicio-editar',['id' => $usuario->usuario_id]) }}" class="btn btn-warning mb-2">Editar Plan</a>
        <a href="{{ route('servicio-eliminar', ['id' => $usuario->usuario_id]) }}" class="btn btn-danger mb-2">Cancelar Plan</a>
        <div>
            <span class="badge rounded-pill bg-info text-dark mb-2 "> &#128197; Tienes una reserva para el : {{$usuario->fecha_reserva }}</span>
        </div>
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
        <a href="{{ route('mp-confirmar', ['id' => $usuario->usuario_id]) }}" class="btn btn-primary">Contratar</a>

    @else
        Sin Servicios contratados. &#128575;

    @endif

@endsection
