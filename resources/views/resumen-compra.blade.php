<?php

/** @var \MercadoPago\Preference $resumen */

?>

@extends('layouts.main')
@section('title', 'Resumen')
@section('main')

    <h2 id="resumenList">Compra exitosa !!!</h2>

    <ul>

        @foreach ($resumen as $key =>  $value )
            @if($key == "merchant_order_id")
                <li  class="fs-6">Número de Orden : {{ $value }}
                </li>
            @endif
                @if($key == "collection_status" && $value == "approved" )
                    <li class="fs-4"> Aprobado
                    </li>
                @endif
        @endforeach
    </ul>
@endsection
