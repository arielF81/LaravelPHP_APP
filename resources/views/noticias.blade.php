<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Noticia[] $noticias */
?>

@extends('layouts.main')
@section('title', 'Blog')
@section('main')
    <h2>Blog &#128008;</h2>
    @foreach($noticias as $noticia)
        <article>
    <div class="card mb-4">
        <div class="card-header">
            {{ $noticia->fecha_publicacion  }}
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $noticia->titulo  }}</h3>
            <div>@if($noticia->etiquetas->isNotEmpty())
                    @foreach($noticia->etiquetas as $etiqueta)
                        <span class="badge bg-success">{{ $etiqueta->nombre }}</span>
                    @endforeach
                @else
                    Sin etiqueta.
                @endif</div>
            <p class="card-text">{{ $noticia->descripcion }}</p>

            <a href="{{ route('noticia-detalle', ['id' => $noticia->noticia_id]) }}" class="btn btn-primary">Ver mas</a>
        </div>
    </div>
        </article>
    @endforeach
@endsection
