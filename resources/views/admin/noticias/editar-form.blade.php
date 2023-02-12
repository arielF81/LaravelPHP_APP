<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Noticia $noticia */

?>

@extends('layouts.admin2')
@section('title', 'Editar ')
@section('main')
    <h2>Editar {{ $noticia->titulo }} </h2>
    <form action="{{ route('admin/noticias/editar/ejecutar', ['id' => $noticia->noticia_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control"
                   @if($errors->has('titulo')) aria-describedby="error-titulo" @endif
                   value="{{ old('titulo', $noticia->titulo) }}"
            >
            @if($errors->has('titulo'))
                <div class="text-danger" id="error-titulo"><span class="visually-hidden">Error: </span> {{ $errors->first('titulo') }}</div>
            @endif
        </div>

        <fieldset class="mb-3">
            <legend>Etiquetas</legend>

            @foreach($etiquetas as $etiqueta)
                <div class="form-check form-check-inline">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="etiqueta-{{ $etiqueta->etiqueta_id }}"
                        name="etiquetas[]"
                        value="{{ $etiqueta->etiqueta_id }}"
                        @checked(in_array($etiqueta->etiqueta_id, old('etiquetas', $noticia->etiquetas->pluck('etiqueta_id')->toArray())))

                    >
                    <label for="etiqueta-{{ $etiqueta->etiqueta_id }}" class="form-check-label">{{ $etiqueta->nombre }}</label>
                </div>
            @endforeach
        </fieldset>



        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea  id="descripcion" name="descripcion" class="form-control"

            >{{ old('descripcion', $noticia->descripcion) }}</textarea>
            @error('descripcion')
            <div class="text-danger" id="error-descripcion" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cuerpo" class="form-label">Cuerpo del post</label>
            <textarea id="cuerpo" name="cuerpo" class="form-control"

            >{{ old('cuerpo', $noticia->cuerpo) }}</textarea>
            @error('cuerpo')
            <div class="text-danger" id="error-cuerpo" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
        <label for="fecha_publicacion" class="form-label">Fecha de Publicacion</label>
        <input type="date" id="fecha_publicacion" name="fecha_publicacion" class="form-control"
               @error('fecha_publicacion') aria-describedby="error-fecha_publicacion" @enderror
               value="{{ old('fecha_publicacion', $noticia->fecha_publicacion) }}"
        >
            @error('fecha_publicacion')
            <div class="text-danger" id="error-fecha_publicacion" ><span class="visually-hidden">Error: </span> {{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="portada" class="form-label">Portada</label>
            <input type="file" id="portada" name="portada" class="form-control">
        </div>
        <div class="mb-3">
            <label for="portada_descripcion" class="form-label">Descripción de la Portada</label>
            <input type="text" id="portada_descripcion" name="portada_descripcion" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
