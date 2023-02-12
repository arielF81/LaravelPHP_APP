<?php

namespace App\Http\Controllers;

use App\Models\Servicios;

class HomeController extends Controller
{
    public function home() {
        $servicios = Servicios::all();
    return view('welcome',
    [
    'servicios' => $servicios,
        ]
    );

    }
}
