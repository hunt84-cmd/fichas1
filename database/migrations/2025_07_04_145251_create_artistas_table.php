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
        Schema::create('programas_artistas', function (Blueprint $table) {
            $table->id();
            $table->double("porciento");
            $table->double("tasa");
            $table->unsignedBigInteger('tipo_artista_id');
            $table->foreign('tipo_artista_id')->references('id')->on('tipo_artistas');
            $table->unsignedBigInteger('programa_id');
            $table->foreign('programa_id')->references('id')->on('programas');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas_artistas');
    }
};
