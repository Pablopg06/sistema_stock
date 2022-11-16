<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->unique()->randomElement(['audio y video','belleza y salud',
        'colchoneria','computacion','computacion', 'deportes y jardin', 'electrohogar',
        'herramientas', 'muebles','niños', 'oficina']);
        return [
            'nombre' => $nombre,
            //'slug' => Str::slug($nombre),
        ];
    }
}
