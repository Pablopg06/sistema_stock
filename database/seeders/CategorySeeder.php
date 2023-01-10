<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre' => 'Audio y Video',
        ]);
        Category::create([
            'nombre' => 'Belleza y Salud',
        ]);
        Category::create([
            'nombre' => 'Colchoneria',
        ]);
        Category::create([
            'nombre' => 'Computacion',
        ]);
        Category::create([
            'nombre' => 'Deportes y Jardin',
        ]);
        Category::create([
            'nombre' => 'Electrohogar',
        ]);
        Category::create([
            'nombre' => 'Herramientas',
        ]);
        Category::create([
            'nombre' => 'Muebles',
        ]);
        Category::create([
            'nombre' => 'Chicos',
        ]);
        Category::create([
            'nombre' => 'Oficina',
        ]);
        Category::create([
            'nombre' => 'Usados',
        ]);
    }
}
