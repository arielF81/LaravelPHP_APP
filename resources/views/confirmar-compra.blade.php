<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Noticia[] $usuarios */
/** @var \MercadoPago\Preference $preference */
/** @var string $publicKey */
?>

@extends('layouts.main')
@section('title', 'Confirmar Compra')

@push('js')
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('{{ $publicKey }}', {
        locale: 'es-AR',
    });

    mp.checkout({
        preference: {
            id: '{{ $preference->id }}',
        },
        render: {
            container: '#mp-wrapper'
        }
    });
</script>
@endpush
@section('main')

    <h2>Mercado Pago</h2>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>

        @foreach($preference->items as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>$ {{ $item->unit_price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>$ {{ $item->unit_price * $item->quantity }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="mp-wrapper"></div>
@endsection
