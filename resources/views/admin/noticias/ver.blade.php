<?php
/** @var \App\Models\Noticia $noticia */
?>

@extends('layouts.admin2')
@section('title',  $noticia->titulo )
@section('main')
    <h2>Detalle de Noticia</h2>

    <h3 class="fs-2">{{ $noticia->titulo }}</h3>
    <h4><span class="badge bg-secondary">{{ $noticia->fecha_publicacion }}</span></h4>
    <div>@if($noticia->etiquetas->isNotEmpty())
            @foreach($noticia->etiquetas as $etiqueta)
                <span class="badge bg-secondary">{{ $etiqueta->nombre }}</span>
            @endforeach
        @else
            Sin etiqueta.
        @endif
    </div>
    <p class="fs-3">{{ $noticia->descripcion }}</p>
    <div class="col-4">
        @if($noticia->portada != null && file_exists(public_path('imgs/' . $noticia->portada)))
            <img src="{{ url('imgs/' . $noticia->portada) }}" alt="{{ $noticia->portada_descripcion }}">
        @endif
    </div>
    <div>{!!$noticia->cuerpo !!}</div>
@endsection
