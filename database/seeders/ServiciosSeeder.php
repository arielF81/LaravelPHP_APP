<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('servicios')->insert([
            [
                'servicio_id' => 1,
                'nombre' => 'Cat Sitting 1 semana',
                'descripcion' => 'Hacemos visitas diarias de dos horas.Los alimentamos,
                los hidratamos y mantenemos limpios sus espacios.
                Promovemos su recreación compartiendo tiempo de juego con ellos. ',
                'precio' => 10000,
                'porcentaje_ventas' => 45.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'servicio_id' => 2,
                'nombre' => 'Cat Sitting 15 días',
                'descripcion' => 'Hacemos visitas diarias de dos horas.Los alimentamos,
                los hidratamos y mantenemos limpios sus espacios.
                Promovemos su recreación compartiendo tiempo de juego con ellos.',
                'precio' => 15000,
                'porcentaje_ventas' => 25.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'servicio_id' => 3,
                'nombre' => 'Cat Sitting 1 mes',
                'descripcion' => 'Hacemos visitas diarias de dos horas.Los alimentamos,
                los hidratamos y mantenemos limpios sus espacios.
                Promovemos su recreación compartiendo tiempo de juego con ellos.',
                'precio' => 30000,
                'porcentaje_ventas' => 15.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'servicio_id' => 4,
                'nombre' => 'Adicional compra de alimentos y otros',
                'descripcion' => 'Nos encargamos de comprar todo lo que haga
                 falta durante el plazo que duren los cuidados y llevarlos a
                 consultas programadas al veterinario',
                'precio' => 5000,
                'porcentaje_ventas' => 2.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'servicio_id' => 5,
                'nombre' => 'Adicional cuidado de plantas y pequeñas mascotas',
                'descripcion' => 'Aún sin ser profesionales en la materia,
                también nos ocupamos de mantener cuidadas tus plantitas.También nos hemos preparado para
                cuidar tortugas, conejos , peces y aves, entre otras.',
                'precio' => 2000,
                'porcentaje_ventas' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'servicio_id' => 6,
                'nombre' => 'Adicional compras de la casa',
                'descripcion' => 'Mandanos una lista de cosas que nesecites y nos ocupamos de comprarlas para que a tu regreso
                no tengas que salir de urgencia a conseguirlas',
                'precio' => 2000,
                'porcentaje_ventas' => 2.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}
