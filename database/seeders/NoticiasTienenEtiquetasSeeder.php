<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiasTienenEtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('noticias_tienen_etiquetas')->insert([
            [
                'noticia_id' => 1,
                'etiqueta_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticia_id' => 1,
                'etiqueta_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticia_id' => 2,
                'etiqueta_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticia_id' => 2,
                'etiqueta_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticia_id' => 2,
                'etiqueta_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
