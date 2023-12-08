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
        } while ($this->exist_url($imageUrl) || !$this->isValidImage($imageUrl));

        return [
            'nombre' => ucfirst(fake()->unique()->regexify('[A-Za-z]{6}')),
            'url_foto' => $imageUrl,
            'descripcion' => ucfirst(fake()->sentence()),
        ];
    }

    public function exist_url($url){
        return Perro::where('url_foto', $url)->exists();
    }

    public function isValidImage($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $code == 200;
    }

}
