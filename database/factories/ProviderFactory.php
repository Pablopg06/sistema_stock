<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->word(15);
        return [
            'nombre' => $nombre,
            'direccion' => $this->faker->word(30),
            'mail' => $this->faker->unique()->safeEmail(),
            
        ];
    }
}
