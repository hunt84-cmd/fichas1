<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Rol;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nombre");
        });
        $data =  array(
            [
                'nombre' => 'ROLE_ADMIN',
            ],
            [
                'nombre' => 'ROLE_EMISORA',
            ],
        );
        foreach ($data as $datum){
            $category = new \App\Models\Role(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
