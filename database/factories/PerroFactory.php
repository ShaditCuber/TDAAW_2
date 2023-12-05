<?php

namespace Database\Factories;

use App\Models\Perro;
use App\Services\PerroService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perro>
 */
class PerroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Perro::class;

    public function definition()
    {
        $perroService = new PerroService();
        $imageUrl = null;

        do {
            $data = $perroService->singleRandomImageFromAllDogsCollection();
            $imageUrl = $data['body']['message'];
        } while ($this->exist_url($imageUrl));

        return [
            'nombre' => ucfirst(fake()->unique()->regexify('[A-Za-z]{6}')),
            'url_foto' => $imageUrl,
            'descripcion' => ucfirst(fake()->sentence()),
        ];
    }

    public function exist_url($url){
        return Perro::where('url_foto', $url)->exists();
    }

}
