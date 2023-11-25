<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interacciones', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('perro_interesado_id');
            $table->uuid('perro_candidato_id');
            $table->enum('preferencia', ['aceptado', 'rechazado']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('perro_candidato_id')->references('id')->on('perros')->onDelete('cascade');
            $table->foreign('perro_interesado_id')->references('id')->on('perros')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('interacciones');
    }
};
