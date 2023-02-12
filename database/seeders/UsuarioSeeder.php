<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('usuarios')->insert([
            [
                'usuario_id' => 1,
                'nombre' => 'Ariel',
                'email' => 'ariel.fiorito@davinci.edu.ar',
                'admin' => true,
                'fecha_reserva' => null ,
                'password' => \Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 2,
                'nombre' => 'Erwin Schrödinger',
                'email' => 'deadandaalive@gmail.com',
                'admin' => false,
                'fecha_reserva' => '2023-01-15',
                'password' => \Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 3,
                'nombre' => 'test2',
                'email' => 'usuario@gmail.com',
                'admin' => false,
                'fecha_reserva' => '2023-02-15',
                'password' => \Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
