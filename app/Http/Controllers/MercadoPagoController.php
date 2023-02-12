<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Servicios;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoController extends Controller
{
    public function confirmarCompra($id)

    {
        $usuario = Usuario::findOrFail($id);
        SDK::setAccessToken(config('mercadopago.access_token'));
        $preference = new Preference();
        $contratados = [];
        foreach($usuario->servicios as $servicio){
            /*echo "<pre>";
            print_r($servicio->servicio_id);
            echo "</pre>";*/
            array_push($contratados,$servicio->servicio_id );
        }
        /*echo "<pre>";
        print_r($contratados);
        echo "</pre>";*/
        $servicios_contratados = Servicios::findMany($contratados);
        $items = [];
        foreach($servicios_contratados as $servicio_contratado){
            $item = new Item();

            $item->title = $servicio_contratado->nombre;
            $item->unit_price = $servicio_contratado->precio;
            $item->quantity = 1;

            $items[] = $item;
            }

        $preference->items = $items;

        $preference->back_urls = [
            'success' => route('success'),


        ];

        $preference->save();
        return view('confirmar-compra',

            [
                'preference' => $preference,
                'publicKey' => config('mercadopago.public_key'),
            ]

        );
    }

    public function successEjecutar(Request $request)
    {
        $resumen =  $request->query();

        return view('resumen-compra',
            [
                'resumen' => $resumen
            ]);

    }

}
