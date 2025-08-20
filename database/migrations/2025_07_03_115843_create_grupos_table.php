<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Grupo;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupos', function (Blueprint $table) {
           $table->id();
             $table->string("nombre");
            $table->timestamps();
        });

        $data =  array(
            [
                'nombre' => 'Escenificados',
            ],
            [
                'nombre' => 'Informativos',
            ],
            [
                'nombre' => 'Variados',
            ],
            [
                'nombre' => 'Musicales',
            ],
            [
                'nombre' => 'Propagandas',
            ],
            [
                'nombre' => 'Cabinas',
            ],
        );
        foreach ($data as $datum){
            $category = new Grupo(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
