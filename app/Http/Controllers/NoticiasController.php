<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias', [
            'noticias' => $noticias,
        ]);
    }

    public function noticiaDetalle($id)
    {

        $noticia = Noticia::findOrFail($id);
        return view('noticia-detalle', [
                'noticia' => $noticia,
            ]
        );
    }
}
