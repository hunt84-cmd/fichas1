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
        Schema::create('clasificaciones', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->unsignedBigInteger('tipo_guion_id');
            $table->foreign('tipo_guion_id')->references('id')->on('tipo_guiones');
            $table->timestamps();
        });
        $data =  array(
            [
                'nombre' => 'Menos Complejo',
                'tipo_guion_id' => 2,
            ],
            [
                'nombre' => 'Complejo',
                'tipo_guion_id' => 2,
            ],
            [
                'nombre' => 'Muy Complejo',
                'tipo_guion_id' => 2,
            ],
            [
                'nombre' => 'Exepcional',
                'tipo_guion_id' => 2,
            ],
            [
                'nombre' => 'Radio Chiste',
                'tipo_guion_id' => 1,
            ],
            [
                'nombre' => 'Radio Comedia',
                'tipo_guion_id' => 1,
            ],
            [
                'nombre' => 'Docudrama',
                'tipo_guion_id' => 1,
            ],
            [
                'nombre' => 'Guion para otros escenificados',
                'tipo_guion_id' => 1,
            ],
        );
        foreach ($data as $datum){
            $category = new \App\Models\Clasificacion(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->tipo_guion_id =$datum['tipo_guion_id'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clasificaciones');
    }
};
