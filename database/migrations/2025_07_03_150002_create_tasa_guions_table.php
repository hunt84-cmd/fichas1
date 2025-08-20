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
        Schema::create('tasa_guiones', function (Blueprint $table) {
            $table->id();
            $table->time('tiempo');
            $table->double('minimo');
            $table->double('maximo');
            $table->unsignedBigInteger('clasificacion_id');
            $table->foreign('clasificacion_id')->references('id')->on('clasificaciones');
            $table->timestamps();

        });
        $data =  array(
            [
                'tiempo' => '00:00:05',
                'minimo' => 15,
                'maximo' => 35,
                'clasificacion_id' => 1
            ],
            [
                'tiempo' => '00:00:10',
                'minimo' => 30,
                'maximo' => 60,
                'clasificacion_id' => 1
            ],
            [
                'tiempo' => '00:00:15',
                'minimo' => 40,
                'maximo' => 80,
                'clasificacion_id' => 1
            ],

        );
        foreach ($data as $datum){
            $category = new \App\Models\TasaGuion(); //The Category is the model for your migration
            $category->tiempo =$datum['tiempo'];
            $category->minimo =$datum['minimo'];
            $category->maximo =$datum['maximo'];
            $category->clasificacion_id =$datum['clasificacion_id'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasa_guiones');
    }
};
