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
        //$perroService = app(PerroService::class);
        //$imageData = $perroService->singleRandomImageFromAllDogsCollection();
        // $imageData = $this->perroService->singleRandomImageFromAllDogsCollection();
        //$imageUrl = $imageData['message']; //url
        //$imageUrl = isset($imageData['body']) ? $imageData['body'] : null;
        $perroService = new PerroService();
        $data = $perroService->singleRandomImageFromAllDogsCollection();
        $imageUrl = $data['body']['message'];
        return [
            'nombre' => ucfirst(fake()->unique()->regexify('[A-Za-z]{6}')),
            'url_foto' => $imageUrl,
            'descripcion' => ucfirst(fake()->sentence()),

        ];
    }
}
