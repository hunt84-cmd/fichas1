<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TipoPrograma;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_programas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->string("categoria");
            $table->timestamps();
        });
        $data = array(
            [
                'nombre' => 'Seriados',
                'grupo' => 1,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Unitarios',
                'grupo' => 1,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Docudrama',
                'grupo' => 1,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Narración con dramatizaciones y Monologos',
                'grupo' => 1,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa de Participación Ciudadana',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Noticiero Estelar',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Revista de Perfil Informativo',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Programa de Debate',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Programa de Comparecencia',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Documental',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Revista de Facilitación Social',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Revista de Perfil Deportivo',
                'grupo' => 2,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Programa de Facilitación Social',
                'grupo' => 2,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Otros noticieros',
                'grupo' => 2,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa Resumen Informativo',
                'grupo' => 2,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa de Género',
                'grupo' => 2,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Revista Deportivo(eventos transmisión)',
                'grupo' => 2,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa de Participación',
                'grupo' => 3,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Revista de Perfil Cultural',
                'grupo' => 3,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Revista de Variedades',
                'grupo' => 3,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Talk Show',
                'grupo' => 3,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Programa Experimental',
                'grupo' => 3,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Charla Expositiva',
                'grupo' => 3,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa de Variedades en Vivo',
                'grupo' => 3,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa de Variedades Grabado',
                'grupo' => 3,
                'categorizacion' => 'Menos Complejo',
            ],
            [
                'nombre' => 'Programa Didactico No Musical',
                'grupo' => 3,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa Musical con Grupo y/o Orquesta',
                'grupo' => 4,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Programa Musical Especializado',
                'grupo' => 4,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Revista de Perfil Musical',
                'grupo' => 4,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Talk Show Musical',
                'grupo' => 4,
                'categorizacion' => 'Muy Complejo',
            ],
            [
                'nombre' => 'Escala Musical',
                'grupo' => 4,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa Didáctico Musical',
                'grupo' => 4,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Musical con Poemas',
                'grupo' => 4,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa Musical Variado en Vivo',
                'grupo' => 4,
                'categorizacion' => 'Complejo',
            ],
            [
                'nombre' => 'Programa Musical Variado Grabado',
                'grupo' => 4,
                'categorizacion' => 'Menos Complejo',
            ],
            [
                'nombre' => 'Musical Monotemático',
                'grupo' => 4,
                'categorizacion' => 'Menos Complejo',
            ],
            [
                'nombre' => 'Discoteca',
                'grupo' => 4,
                'categorizacion' => 'Menos Complejo',
            ],
        );

        foreach ($data as $datum){
            $category = new TipoPrograma(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->grupo_id =$datum['grupo'];
            $category->categoria =$datum['categorizacion'];
            $category->save();
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_programas');
    }
};
