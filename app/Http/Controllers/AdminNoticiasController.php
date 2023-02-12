<?php

namespace App\Http\Controllers;

use App\Models\Etiquetas;
use App\Models\Servicios;
use Illuminate\Http\Request;
use App\Models\Noticia;

class AdminNoticiasController extends Controller
{
    public function noticiasAdmin() {

        $noticias = Noticia::all();
        
        $elementos_noticias = [];
        foreach ($noticias as $noticia) {
            $elementos_noticias[] = ["name" => $noticia["titulo"],
                "y"=> floatval($noticia["porcentaje_lectura"])];
        }
        return view('admin/noticias/admin-noticias' ,  [
            'noticias' => $noticias,
            'data_noticias'=> json_encode( $elementos_noticias)
        ]);
    }
    public function noticiaNueva() {
    return view('admin/noticias/nueva-form' ,  [
        'etiquetas' => Etiquetas::orderBy('nombre')->get(),
    ]);
    }

    public function noticiaNuevaGrabar(Request $request) {

        //traer los datosmenos el token
        $data = $request->except(['_token']);
        //echo "<pre>";
        //print_r($data);
        //echo "</pre>";
        //validaciones
        $request->validate(Noticia::REGLAS_VALIDACION, Noticia::MENSAJES_VALIDACION);

        if($request->hasFile('portada')) {
            $portada = $request->file('portada');
            // nombrar la imagen
            $nombrePortada = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $portada->clientExtension();
            //moverla a la carpeta img con el metodo move()
            $portada->move(public_path('imgs'), $nombrePortada);

            $data['portada'] = $nombrePortada;
        }

        try {
            \DB::transaction(function() use ($data) {
                $noticia = Noticia::create($data);
                $noticia->etiquetas()->attach($data['etiquetas'] ?? []);
            });

        } catch(\Exception $e) {

        }



        return redirect()->route("admin/noticias")
            ->with('status.message', 'Articulo creado.')
            ->with('status.type', 'success');
    }

    public function noticiaVer($id) {
        //echo "<pre>";
       // print_r($id);
        //echo "</pre>";
        $noticia = Noticia::findOrFail($id);
        return view('admin/noticias/ver' ,[
                'noticia' => $noticia,
            ]
         );
    }

public function eliminarConfirmar($id) {

    $noticia = Noticia::findOrFail($id);
    return view('admin/noticias/eliminar' ,[
            'noticia' => $noticia,
        ]
    );
}

    public function eliminarEjecutar($id) {

        $noticia = Noticia::findOrFail($id);
        $noticia->etiquetas()->detach();
        $noticia->delete();
        return redirect()->route("admin/noticias")
            ->with('status.message', 'El artículo <b>' . e($noticia->titulo) . '</b> fue eliminado.')
            ->with('status.type', 'success');

    }
    public function editarForm($id) {

        $noticia = Noticia::findOrFail($id);
        return view('admin/noticias/editar-form' ,[
                'noticia' => $noticia,
                'etiquetas' => Etiquetas::orderBy('nombre')->get(),
            ]
        );
    }

    public function editarEjecutar(Request $request, int $id) {
        $request->validate(Noticia::REGLAS_VALIDACION, Noticia::MENSAJES_VALIDACION);
        $noticia = Noticia::findOrFail($id);
        $data = $request->except(['_token']);
        if($request->hasFile('portada')) {
            $portada = $request->file('portada');
            $nombrePortada = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $portada->clientExtension();
            $portada->move(public_path('imgs'), $nombrePortada);
            $data['portada'] = $nombrePortada;
            $portadaVieja = $noticia->portada;
        }
        $noticia->update($data);

        $noticia->etiquetas()->sync($data['etiquetas'] ?? []);
        if($portadaVieja ?? false) {
            unlink(public_path('imgs/' . $portadaVieja));
        }
        return redirect()->route("admin/noticias")
            ->with('status.message', 'Se guardaron los cambios')
            ->with('status.type', 'success');

    }

}
