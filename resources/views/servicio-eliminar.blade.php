<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Usuario[] $usuarios
 */

?>

@extends('layouts.main')
@section('title', 'Eliminar ')
@section('main')
    <h2>Cancelar mi Plan</h2>
    <div>
        <span class="badge rounded-pill bg-info text-dark mb-2 "> &#128197; Tienes una reserva para el : {{$usuario->fecha_reserva }}</span>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        </thead>
        <tbody>

        @foreach($usuario->servicios as $servicio)
            <tr>
                <td>{{ $servicio->nombre }}</td>
                <td>${{ $servicio->precio }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <form action="{{ route('servicio/eliminar/ejecutar', ['id' => $usuario->usuario_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
            <button type="submit" class="btn btn-danger">
                Confirmar
            </button>
    </form>



@endsection
