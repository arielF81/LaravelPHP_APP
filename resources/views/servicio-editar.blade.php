<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Usuario[] $usuarios
 */

?>

@extends('layouts.main')
@section('title', 'Editar ')
@section('main')
    <h2>Editar</h2>

    <form action="{{ route('servicio/editar/ejecutar', ['id' => $usuario->usuario_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <fieldset class="mb-3">
            <legend> &#128008; Agregar/Quitar Servicios</legend>

                @foreach($servicios as $servicio)
                    <div class="form-check form-check-inline">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="servicios-{{ $servicio->servicio_id }}"
                            name="servicios[]"
                            value="{{ $servicio->servicio_id }}"
                            @checked(in_array($servicio->servicio_id, old('servicios', $usuario->servicios->pluck('servicio_id')->toArray())))

                        >
                        <label for="servicios-{{ $servicio->servicio_id }}" class="form-check-label">{{ $servicio->nombre }}</label>
                    </div>
                @endforeach
            </fieldset>

        <div class="mb-3">
            <label for="fecha_reserva" class="form-label">  &#128197; Cambiar fecha de reserva</label>
            <input
                type="date"
                id="fecha_reserva"
                name="fecha_reserva"
                class="form-control"
                value="{{ old('fecha_reserva', $usuario->fecha_reserva) }}"

            >

        </div>



            <button type="submit" class="btn btn-primary">Guardar</button>
    </form>



@endsection
