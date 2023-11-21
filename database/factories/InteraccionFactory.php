<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Interaccion;
use App\Models\Perro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interaccion>
 */
class InteraccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Interaccion::class;

    public function definition()
    {
        return [
            //
            //'perro_interesado_id' => Perro::factory(),
            //'perro_candidato_id' => Perro::factory(),
            'perro_interesado_id' => Perro::all()->random()->id,
            'perro_candidato_id' => Perro::all()->random()->id,
            'preferencia' => fake()->randomElement(['aceptado', 'rechazado'])
            // $table->foreign('perro_candidato_id')->references('id')->on('perros')->onDelete('cascade');
            // $table->foreign('perro_interesado_id')->references('id')->on('perros')->onDelete('cascade');

        ];
    }
}
