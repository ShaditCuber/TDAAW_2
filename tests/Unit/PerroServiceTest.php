<?php

namespace Tests\Unit;

use App\Services\PerroService;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;

use Tests\TestCase;

class PerroServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    /** @test */
    public function puede_obtener_una_url_de_imagen_de_perro()
    {
        $perroService = new PerroService();
        $data = $perroService->singleRandomImageFromAllDogsCollection();
        $imageUrl = $data['body']['message'];

        // Realiza las aserciones que consideres necesarias
        $this->assertNotEmpty($imageUrl);
        $this->assertStringStartsWith('https', $imageUrl);
    }

    // public function test_example()
    // {
    //     $this->assertTrue(true);
    // }
}
