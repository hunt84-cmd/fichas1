<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Funcion;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->timestamps();
        });

        $data =  array(
            [
                'nombre' => 'Recreativa',
            ],
            [
                'nombre' => 'Informativa',
            ],
            [
                'nombre' => 'Cultural',
            ],
            [
                'nombre' => 'Divulgativa',
            ],
            [
                'nombre' => 'Orientación',
            ],
        );
        foreach ($data as $datum){
            $category = new Funcion(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funciones');
    }
};
