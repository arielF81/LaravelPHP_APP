<?php
/** @var \App\Models\Noticia $noticia */
?>

@extends('layouts.admin2')
@section('title',  $noticia->titulo )
@section('main')
    <h2>Eliminar Publicacion</h2>

    <h3>{{ $noticia->titulo }}</h3>
    <h4><span class="badge bg-secondary">{{ $noticia->fecha_publicacion }}</span></h4>
    <p>{{ $noticia->descripcion }}</p>
    <div class="col-4">
        @if($noticia->portada != null && file_exists(public_path('imgs/' . $noticia->portada)))
            <img src="{{ url('imgs/' . $noticia->portada) }}" alt="{{ $noticia->portada_descripcion }}">
        @endif
    </div>

    <form action="{{ route('admin/noticias/eliminar/ejecutar', ['id' => $noticia->noticia_id]) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger mt-2">Eliminar</button>
    </form>
@endsection
