<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Noticia[] $usuarios */
?>

@extends('layouts.admin2')
@section('title', 'Lista de usuarios')

@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('container2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Plan con más suscripciones 2022'
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
                data:  <?= $data ?>
            }]
        });
    </script>
@endpush('js')
@section('main')
    <h2>Admin de usuarios</h2>
    <div id="container2"></div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo de usuario</th>
            <th>Perfil</th>

        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)

            <tr>
                <td>{{ $usuario->usuario_id }}</td>
                <td>{{ $usuario->nombre }}</td>
                @if($usuario->admin)
                <td>Administrador</td>
                 @else
                    <td>Común</td>
            @endif
                <td>
                    <a href="{{ route('admin/usuarios/ver', ['id' => $usuario->usuario_id ]) }}" class="btn btn-primary m-auto">Ver</a>

                </td>
        @endforeach
        </tbody>
    </table>

@endsection
