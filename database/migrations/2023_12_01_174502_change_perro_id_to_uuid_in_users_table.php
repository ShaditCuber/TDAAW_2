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
        Schema::table('users', function (Blueprint $table) {
            // Cambia el tipo de la columna a UUID
            $table->uuid('perro_id')->nullable()->change();

            // Agrega la relación de clave foránea
            $table->foreign('perro_id')->references('id')->on('perros')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('users', function (Blueprint $table) {
            // Para revertir, primero elimina la restricción de clave foránea
            $table->dropForeign(['perro_id']);

            // Luego cambia el tipo de columna de nuevo a integer o lo que sea necesario
            $table->integer('perro_id')->nullable()->change();
        });
    }
};
