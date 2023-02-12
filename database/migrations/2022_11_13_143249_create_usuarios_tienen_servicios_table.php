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
        Schema::create('usuarios_tienen_servicios', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained('usuarios', 'usuario_id');

            $table->unsignedTinyInteger('servicio_id');
            $table->foreign('servicio_id')->references('servicio_id')->on('servicios');

            $table->primary(['usuario_id', 'servicio_id']);

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
        Schema::dropIfExists('usuarios_tienen_servicios');
    }
};
