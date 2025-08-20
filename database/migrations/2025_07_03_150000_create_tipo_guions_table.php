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
        Schema::create('tipo_guiones', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->timestamps();
        });
        $data =  array(
            [
                'nombre' => 'Escenificados',
            ],
            [
                'nombre' => 'No Escenificados',
            ],
            [
                'nombre' => 'Propaganda y publicidad',
            ],
            [
                'nombre' => 'Identidad Sonora',
            ],
        );
        foreach ($data as $datum){
            $category = new \App\Models\TipoGuion();
            $category->nombre =$datum['nombre'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_guiones');
    }
};
