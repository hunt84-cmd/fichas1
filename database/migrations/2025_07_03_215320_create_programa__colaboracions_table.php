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
        Schema::create('programas_colaboraciones', function (Blueprint $table) {

            $table->id();
            $table->string("nombre");
            $table->unsignedBigInteger('colaboracion_id');
            $table->foreign('colaboracion_id')->references('id')->on('colaboraciones');
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
        Schema::dropIfExists('programas_colaboraciones');
    }
};
