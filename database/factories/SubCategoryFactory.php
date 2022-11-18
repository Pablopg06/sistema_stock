<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->unique()->randomElement(['equipos de musica','radiograbador',
        'dvd','parlantes','movie theatre', 'mp3 mp4 y mas', 'televisores',
        'stereo', 'planchitas','secadores', 'afeitadoras']);
        return [
            'nombre' => $nombre,
            //'slug' => Str::slug($nombre),
            'category_id' => Category::all()->random()->id
        ];
    }
}
