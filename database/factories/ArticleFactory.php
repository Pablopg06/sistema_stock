<?php

namespace Database\Factories;

use App\Models\Provider;
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
            //'proveedor' => $this->faker->word(15),
            'codigo' => $this->faker->randomNumber(5),
            'foto' => $this->faker->randomElement(['http://localhost/sistema_stock/public/storage/image1.jpg',
            'http://localhost/sistema_stock/public/storage/image2.jpg','http://localhost/sistema_stock/public/storage/image3.jpg']),
            //'foto' => 'articulos/' . $this->faker->image('public/storage', 640, 480, null, false),
            'filtro' => $this->faker->word(15),
            'marca' => $this->faker->word(15),
            'stock' => $this->faker->randomNumber(3),
            'deposito' => $this->faker->randomElement(['deposito A', 'deposito B', 'deposito C']),
            'subcategory_id' => SubCategory::all()->random()->id,
            'provider_id' => Provider::all()->random()->id,

        ];
    }
}
