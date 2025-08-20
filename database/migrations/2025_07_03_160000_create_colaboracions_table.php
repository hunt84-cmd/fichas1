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
        Schema::create('colaboraciones', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->double("minimo");
            $table->double("maximo");
            $table->timestamps();
        });
        $data =  array(
            [
                'nombre' => 'Información',
                'minimo' => 50,
                'maximo' => 500,
            ],
            [
                'nombre' => 'Reportaje',
                'minimo' => 300,
                'maximo' => 1700,
            ],
            [
                'nombre' => 'Entrevista informativa',
                'minimo' => 100,
                'maximo' => 700,
            ],
            [
                'nombre' => 'Entrevista a personalidad: entrevistador y entrevistado',
                'minimo' => 300,
                'maximo' => 1000,
            ],
            [
                'nombre' => 'Crónica',
                'minimo' => 300,
                'maximo' => 1500,
            ],
            [
                'nombre' => 'Editorial',
                'minimo' => 300,
                'maximo' => 1500,
            ],
            [
                'nombre' => 'Reportaje',
                'minimo' => 300,
                'maximo' => 1700,
            ],
            [
                'nombre' => 'Artículo',
                'minimo' => 300,
                'maximo' => 1500,
            ],
        );
        foreach ($data as $datum){
            $category = new \App\Models\Colaboracion(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->minimo =$datum['minimo'];
            $category->maximo =$datum['maximo'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboraciones');
    }
};
