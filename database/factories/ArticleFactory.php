<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            //'slug' => Str::slug($nombre),
            'proveedor' => $this->faker->word(15),
            'codigo' => $this->faker->randomNumber(5),
            'foto' => $this->faker->randomElement(['http://localhost/img/image1.jpg',
            'http://localhost/img/image2.jpg','http://localhost/img/image3.jpg']),
            'filtro' => $this->faker->word(15),
            'marca' => $this->faker->word(15),
            'stock' => $this->faker->randomNumber(3),
            'deposito' => $this->faker->randomElement(['deposito A', 'deposito B', 'deposito C']),
            'subcategory_id' => SubCategory::all()->random()->id

        ];
    }
}
