<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminUsuariosController extends Controller
{
    public function usuariosAdmin() {
        $usuarios = Usuario::all();
        $servicios = Servicios::all();
        $elementos_servicios = [];
        foreach ($servicios as $servicio) {
            $elementos_servicios[] = ["name" => $servicio["nombre"],
                "y"=> floatval($servicio["porcentaje_ventas"])];
        }
        return view('admin/usuarios/admin-usuarios' ,[
        'usuarios' => $usuarios,
            'data'=> json_encode( $elementos_servicios),
    ]);
    }


    public function usuarioVer($id) {

        $usuario = Usuario::findOrFail($id);
        return view('admin/usuarios/ver' ,[
                'usuario' => $usuario,
            ]
        );
    }

}
