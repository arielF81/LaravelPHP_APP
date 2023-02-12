<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('etiquetas')->insert([
            [
                'etiqueta_id' => 1,
                'nombre' => 'Gatos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 2,
                'nombre' => 'Mascotas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 3,
                'nombre' => 'Cuidado animal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 4,
                'nombre' => 'Pet sitting',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
