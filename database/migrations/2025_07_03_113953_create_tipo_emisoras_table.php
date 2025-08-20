<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TipoEmisora;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_emisoras', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->timestamps();
        });
        $data =  array(
            [
                'nombre' => 'Municipal',
            ],
            [
                'nombre' => 'Provincial',
            ],
            [
                'nombre' => 'Nacional',
            ],
        );
        foreach ($data as $datum){
            $category = new TipoEmisora(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->save();
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_emisoras');
    }
};
