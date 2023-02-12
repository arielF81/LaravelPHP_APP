<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends User
{
   // use HasFactory;
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    protected $fillable = ['nombre', 'password', "email", 'admin','fecha_reserva' ];
    protected $hidden = ['password', 'remember_token'];

    public const REGLAS_VALIDACION = [
        'nombre' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];
    public const REGLAS_PERFIL_VALIDACION = [
        'nombre' => 'required',
        'email' => 'required',
    ];
    public const MENSAJES_PERFIL_VALIDACION = [
        'nombre.required' => 'Debe ingresar un nombre',
        'email.required' => 'Debe ingresar un email',
    ];
    public const MENSAJES_VALIDACION = [
        'nombre.required' => 'Debe ingresar un nombre',
        'email.required' => 'Debe ingresar un email',
        'password.required' => 'El password no puede quedar vacío.',
    ];

    public function servicios()
    {

        return $this->belongsToMany(
            Servicios::class,
            'usuarios_tienen_servicios',
            'usuario_id',
            'servicio_id',
            'usuario_id',
            'servicio_id',
        );
    }

}

