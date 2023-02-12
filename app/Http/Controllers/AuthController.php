<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth/login');
    }

    public function loginEjecutar(Request $request)
    {

        $credenciales = [
            'nombre' => $request->input('nombre'),
            'password' => $request->input('password'),
        ];

        if(Auth::attempt($credenciales)) {

            $request->session()->regenerate();

            return redirect()
                ->route('admin/noticias')
                ->with('status.message', 'Sesión iniciada')
                ->with('status.type', 'success');
        }
        return redirect()
            ->route('auth/login/form')
            ->with('status.message', 'Los datos ingresadas no coinciden.')
            ->with('status.type', 'danger')
            ->withInput();

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth/login/form')
            ->with('status.message', 'La sesión se cerró correctamente')
            ->with('status.type', 'success');
    }

}
