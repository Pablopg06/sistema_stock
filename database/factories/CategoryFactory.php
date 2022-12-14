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
        $nombre = $this->faker->unique->randomElement(['Audio y Video','Belleza y Salud',
        'Colchonería','Computación', 'Deportes y Jardín', 'Electrohogar',
        'Herramientas', 'Muebles','Niños', 'Oficina']);
        return [
            'nombre' => $nombre,
            //'slug' => Str::slug($nombre),
        ];
    }
}
