<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id('noticia_id');
            $table->string('titulo', 100);
            $table->string('descripcion', 255);
            $table->mediumText('cuerpo');
            $table->date('fecha_publicacion');
            $table->string('portada', 255)->nullable();
            $table->string('portada_descripcion', 255)->nullable();
            $table->float('porcentaje_lectura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
};
