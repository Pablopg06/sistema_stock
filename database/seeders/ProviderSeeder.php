<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'nombre' => 'Sony',
            'direccion' => 'Libertador 1450 oeste',
            'mail' => 'sony@gmail.com'
        ]);
        //Provider::factory(10)->create();
    }
}
