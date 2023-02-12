<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registro() {
        return view('registro');

    }

    public function registroNuevo(Request $request) {
        $request->validate(Usuario::REGLAS_VALIDACION, Usuario::MENSAJES_VALIDACION);
        $data = $request->except(['_token']);

        if($request->input('password')){
            $password = $request->input('password');
            $hash = Hash::make($password);
            $data['password'] = $hash;

        }
        $usuario = Usuario::create($data);
        try {
            \DB::transaction(function() use ($data) {


            });

        } catch(\Exception $e) {

        }

        return redirect()->route("auth/login/form")
            ->with('status.message', 'Usuario creado.')
            ->with('status.type', 'success');
    }
}
