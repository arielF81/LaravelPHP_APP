<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Servicios[] $servicios */
?>


@extends('layouts.main')
@section('title', 'Inicio')
@section('main')
<h2 id="h2titulo" class="text-center">Servicio de Cat Sitting en Buenos Aires </h2>
<img id="gatito" src="imgs/gatoencaja.jpg" alt="gato en una caja">
    <p class="fs-3 text-center mt-4" >Somos un grupo de expertos que ofrece su servicio para ser "niñeros" de
        las mascotas cuando sus familias se ausentan.</p>
    <h3 class="text-center">¿Por qué necesitás un cat sitter? &#128568;</h3>

    <p class="text-center">A pesar de la reputación que tienen los gatos de ser independientes,
        el cuidado de un cat sitter a domicilio es una forma importante de garantizar su bienestar,
        ya que la mayoría de ellos son propensos a
        mostrar signos de ansiedad o estrés ante cualquier cambio de rutina y de espacios.</p>
    <h4 class="text-center">Ofrecemos &#9989;</h4>
    <ul class="text-center">
        <li>Visitas diarias de diferente duración en la modalidad de una o dos horas.</li>
        <li>Los alimentamos, los hidratamos y mantenemos limpios sus espacios.</li>
        <li>Promovemos su recreación compartiendo tiempo de ideojuego con ellos.</li>
        <li>Un reporte completo a modo de resumen de su actividad, con fotos, videos y videollamada.
        </li>
    </ul>
<ul>
@foreach($servicios as $servicio)
        <li>
        <div class="card mb-4">
            <div class="card-header">
                {{ $servicio->nombre }}
            </div>
            <div class="card-body border-warning" >
                <p class="card-text">{{ $servicio->descripcion }}</p>
                <p class="card-text">Precio: ${{ $servicio->precio }}</p>

            </div>
        </div>
        </li>
@endforeach
</ul>

@endsection
