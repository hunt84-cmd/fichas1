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
        Schema::create('tipo_artistas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->timestamps();
        });
        $data =  array(
            [
                'nombre' => 'Sonidista',
            ],
            [
                'nombre' => 'Locutor',
            ],
            [
                'nombre' => 'Musicalizador',
            ],
            [
                'nombre' => 'Asesor',
            ],
            [
                'nombre' => 'Efectista',
            ],
            [
                'nombre' => 'Actor',
            ],
            [
                'nombre' => 'Narrador Deportivo',
            ],
            [
                'nombre' => 'Director',
            ],
        );
        foreach ($data as $datum){
            $category = new \App\Models\TipoArtista(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_artistas');
    }
};
