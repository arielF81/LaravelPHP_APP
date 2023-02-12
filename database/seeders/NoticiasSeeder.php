<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticias')->insert([
            [
                'noticia_id' => 1,
                'titulo' => 'Cómo conocer el animo de tu gato',
                'descripcion' => 'Hay señales corporales que permiten descifrar los sentimientos del gato.',
                'cuerpo' => '<p>Se afirma en términos generales que los gatos son fríos y no demuestran sus sentimientos pero sin embargo los especialistas opinan lo contrario. Los gatos sienten verdadero amor por su ser humano favorito y su entorno familiar,
lo que van demostrando de forma sutil pero a la vez muy clara.</p>

<p>Algunos de esos signos de afecto y complacencia pueden ser:</p>

<ul class="list-group">
    <li class="list-group-item">Camina cerca nuestro con la cola alzada y vibrante: de esta forma nos está saludando y lo hace con alegría y felicidad por estar junto a nosotros.</li>
    <li class="list-group-item">Duerme encima nuestro o se acurruca sobre nosotros: esta actitud demuestra claramente que se siente tranquilo y por lo tanto le resta importancia al hecho de estar indefenso. Esta actitud la suelen también con otros gatos o con otros animales convivientes.</li>
    <li class="list-group-item">Se pone panza arriba: la parte más vulnerable de cualquier animal, y el gato no es la excepción, es el abdomen. Si un gato se coloca con las patas y la panza hacia arriba es que está intentando manifestar seguridad, cariño y respeto, hacia el ser humano cercano a quien se lo demuestra. Rara vez se trata de una petición de mimos, por eso rechazan cualquier contacto la mayoría de las veces.</li>
    <li class="list-group-item">Se mete en nuestra cama: si un gato hace esto está dando una clara señal de sentirse seguro y amado. Nuestro tamaño gigantesco, comparado con el gato, lo abruma. Lo cierto es que acostados las diferencias físicas se achican lo que los hace sentirse más seguros.</li>
    <li class="list-group-item">Maullidos: es importante recordar que los gatos solo les maúllan a los seres humanos. Por eso cuando un gato adulto maúlla lo hace para comunicarse a través de una de las formas más cariñosas que tiene manifestando que quiere algo o simplemente conectarse con nosotros.</li>
    <li class="list-group-item">Parpadeo lento: sería lo que conocemos como hacer “ojitos” parpadeando despacio, así nos manifiesta su felicidad por estar juntos. Es bueno devolverle el gesto repitiendo la mueca como una hermosa manera de comunicación multiespecie.</li>
    <li class="list-group-item">Frotarse en nuestro cuerpo o ropa: repiten una actitud que suelen hacer con otros felinos, diciéndonos claramente que nos quieren, que nos considera sus amigos incorporándonos a su grupo social.</li>

</ul>',
                'fecha_publicacion' => '2022-10-07',
                'portada' => "gatito2.jpg",
                'portada_descripcion' => "mano acariciando gato",
                'porcentaje_lectura' => 65.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticia_id' => 2,
                'titulo' => 'Pet sitters se instaura cada día más en Argentina',
                'descripcion' => 'Pet sitters consiste en ofrecer diferentes tipos de servicios para el cuidado de tu mascota mientras no te encuentras en casa.',
                'cuerpo' => '<p>El concepto de “Pet Sitter” –niñero de mascotas- ha sido un término que ha venido creciendo desde hace varios años en países como España, USA o Canadá, hasta el punto de ser algo cotidiano, como el tener una empleada doméstica o una persona encargada
    del cuidado de los niños mientras los padres no están.</p>
<p>Pet Sitters consiste en ofrecer distintos servicios a las personas que tienen animales en casa y que carecen del tiempo necesario para su total cuidado:</p>
<ul class="list-group">
    <li class="list-group-item">Pett Sitter para perros: El Pet Sitting (cuidador personalizado a domicilio), se da en casa si el dueño lo prefiere o, preferiblemente, irá acompañado de un servicio de paseador personalizado, donde hay un máximo de 5 perros por paseo. Una vez dentro
        del servicio nos encargamos de separar a cada perrito en un grupo apropiado dependiendo de su tamaño</li>
    <li class="list-group-item">Pett Sitter para gatos: El Pet Sitting, se da en caso de que tengas algún viaje o por algún motivo debes salir de tu domicilio por viaje o un tiempo prolongado y no sabes con quién dejar a tu mascota. En este caso, nuestro Pet Sitter irá a tu casa,
        le dará de comer, lo cepillará, le cambiará su arenita, jugará con él, le dará agua y aplicará sus medicamentes de ser necesario.</li>
</ul>
<p>Los beneficios que trae este novedoso concepto de niñero en casa de mascotas son innumerables, desde la reducción de estrés del animal al no estar durante tanto tiempo solo en casa, la posibilidad de no realizar viajes con el animal cuando no sea necesario
    ahorrando posibles molestias para el mismo, la comodidad de la mascota al permanecer en su zona de confort y espacio conocido, la posibilidad de tener reportes de los cuidadores con fotos/videos de las mascotas mientras su dueño no está, hasta el
    cuidado de necesidades especiales, como la aplicación de medicina necesaria de ser el caso.</p>',
                'fecha_publicacion' => '2022-10-07',
                'portada' => "gatito1.jpg",
                'portada_descripcion' => "gato durmiendo en una caja",
                'porcentaje_lectura' => 34.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
