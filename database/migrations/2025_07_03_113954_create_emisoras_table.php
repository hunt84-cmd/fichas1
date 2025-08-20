<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Emisora;

class CreateEmisorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emisoras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nombre");
            $table->date("periodo")->default(now());
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
			$table->unsignedBigInteger('insp_id')->nullable();
            $table->foreign('insp_id')->references('id')->on('users');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipo_emisoras');
        });
        $data =  array(
            [
                'nombre' => 'Angulo',
                'user_id' => 1,
                'insp_id' => 1,
                'tipo_id' => 1,
            ],

        );
        foreach ($data as $datum){
            $category = new Emisora(); //The Category is the model for your migration
            $category->nombre =$datum['nombre'];
            $category->user_id =$datum['user_id'];
            $category->insp_id =$datum['insp_id'];
            $category->tipo_id =$datum['tipo_id'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emisoras');
    }
}
