<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perro;
use Database\Factories\PerroFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Perro::factory(10)->create();

        try {
            // Perro::factory()->count(1)->create();
            Perro::factory(200)->create();
        } catch (\Exception $e) {
            // Manejar el error
            dd($e->getMessage());
        }
    }
}
