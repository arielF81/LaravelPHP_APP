<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Noticia[] $noticias */
?>

@extends('layouts.admin2')
@section('title', 'Admin de Noticias')

@push('js')

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Noticias más leídas 2022'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data:  <?= $data_noticias ?>
            }]
        });
    </script>

@endpush('js')
@section('main')
    <h2>Panel de Noticias</h2>

    <div id="container"></div>



    <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header">Usuario</div>
        <div class="card-body">
            <h3 class="card-title">{{ auth()->user()->nombre }}</h3>
            <p class="card-text">{{ auth()->user()->email }}</p>
        </div>
    </div>


    <p class="mb-3">
        <a href="{{ route('admin/noticias/nueva-form') }}" class="btn btn-primary">Nuevo post</a>
    </p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Etiquetas</th>
            <th>Descripción</th>

            <th>Fecha de Publicación</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($noticias as $noticia)

            <tr>
                <td>{{ $noticia->noticia_id }}</td>
                <td>{{ $noticia->titulo }}</td>
                <td>
                    @if($noticia->etiquetas->isNotEmpty())
                    @foreach($noticia->etiquetas as $etiqueta)
                        <span class="badge bg-secondary">{{ $etiqueta->nombre }}</span>
                    @endforeach
                    @else
                        Sin etiqueta.
                    @endif

                </td>
                <td>{{ $noticia->descripcion }}</td>

                <td>{{ $noticia->fecha_publicacion }}</td>
                <td>
                    <a href="{{ route('admin/noticias/ver', ['id' => $noticia->noticia_id]) }}" class="btn btn-primary m-auto">Ver</a>
                    <a href="{{ route('admin/noticias/editar-form', ['id' => $noticia->noticia_id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('admin/noticias/eliminar/confirmar', ['id' => $noticia->noticia_id]) }}" class="btn btn-danger mt-2 ">Eliminar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
