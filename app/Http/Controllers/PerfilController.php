<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilController extends Controller
{


    public function perfil()
    {
        $id = Auth::id();
        $usuario = Usuario::findOrFail($id);
        return view('perfil',[
        'usuario' => $usuario,
            ]);

    }

    public function perfilEditarForm($id) {
        $usuario = Usuario::findOrFail($id);
        return view('perfil-editar',[
                'usuario' => $usuario,
            ]
        );
    }


    public function perfilEditarEjecutar(Request $request, int $id) {
        $request->validate(Usuario::REGLAS_PERFIL_VALIDACION, Usuario::MENSAJES_PERFIL_VALIDACION);
        $usuario = Usuario::findOrFail($id);
        $data = $request->except(['_token']);
        $usuario->update($data);
        return redirect()->route("perfil")
            ->with('status.message', 'Datos modificados con exito')
            ->with('status.type', 'success');
    }


}


