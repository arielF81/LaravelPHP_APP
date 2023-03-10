<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Noticia
 *
 * @property int $noticia_id
 * @property string $titulo
 * @property string $descripcion
 * @property string $cuerpo
 * @property string $fecha_publicacion
 * @property string|null $portada
 * @property string|null $portada_descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereCuerpo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereFechaPublicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereNoticiaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia wherePortadaDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Noticia extends Model
{
   // use HasFactory;
    protected $table = 'noticias';
    protected $primaryKey = 'noticia_id';
    protected $fillable = ['titulo', 'descripcion', 'cuerpo', 'fecha_publicacion', 'portada', 'portada_descripcion','porcentaje_lectura',  ];

    public const REGLAS_VALIDACION = [
        'titulo' => 'required|min:2',
        'descripcion' => 'required',
        'cuerpo' => 'required',
        'fecha_publicacion' => 'required',

    ];
    public const MENSAJES_VALIDACION = [
        'titulo.required' => 'El t??tulo no puede quedar vac??o.',
        'titulo.min' => 'El t??tulo debe tener al menos :min caracteres.',
        'cuerpo.required' => 'El cuerpo no puede quedar vac??o.',
        'descripcion.required' => 'La descripci??n no puede quedar vac??a.',
        'fecha_publicacion.required' => 'La fecha de publicacion no puede quedar vac??a.',

    ];

    public function etiquetas()
    {

        return $this->belongsToMany(
            Etiquetas::class,
            'noticias_tienen_etiquetas',
            'noticia_id',
            'etiqueta_id',
            'noticia_id',
            'etiqueta_id',
        );
    }

}
