<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->boolean('habilitado')->default(true);
            $table->string("nombre");
            $table->string("objetivo");
            $table->string("descripcion");
            $table->date("creacion");
            $table->boolean('origen')->default(true);
            $table->json('dias');
            $table->json('porciento_musica');
            $table->time('inicio')->default("00:00:00");
            $table->time('final')->default("00:00:00");
            $table->unsignedBigInteger('emisora_id');
            $table->foreign('emisora_id')->references('id')->on('emisoras');
            $table->unsignedBigInteger('funcion_id');
            $table->foreign('funcion_id')->references('id')->on('funciones');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipo_programas');
            $table->string("tema");
            $table->string("especificacion");
            $table->string("destinatario");
            $table->json('tiempo_aproximado');
            $table->boolean("vivo")->default(0);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
