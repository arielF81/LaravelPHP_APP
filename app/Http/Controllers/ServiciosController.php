<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{


    public function serviciosEditarForm($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('servicio-editar', [

                'usuario' => $usuario ,
                'servicios' => Servicios::orderBy('nombre')->get(), ]
        );
    }


    public function serviciasEditarEjecutar(Request $request, int $id) {

        $usuario = Usuario::findOrFail($id);
        $data = $request->except(['_token']);
        $usuario->update($data);
        $usuario->servicios()->sync($data['servicios'] ?? []);

        return redirect()->route("perfil")
            ->with('status.message', 'Servicios editados con exito')
            ->with('status.type', 'success');

    }

    public function serviciosEliminarForm($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('servicio-eliminar', [

                'usuario' => $usuario ]
        );
    }

public function serviciasEliminarEjecutar(Request $request, int $id) {

    $usuario = Usuario::findOrFail($id);
    $data = $request->except(['_token']);
    $usuario->update($data);
    $usuario->servicios()->sync($data['servicios'] ?? []);

    return redirect()->route("perfil")
        ->with('status.message', 'Plan eliminado con éxito')
        ->with('status.type', 'success');

}



}

