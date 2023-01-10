<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'nombre' => 'ELIZONDO',
            'direccion' => 'Elizondo 3957 (s) Villa Krause'
        ]);
        Store::create([
            'nombre' => 'SARMIENTO',
            'direccion' => 'Franklin Rawson 3155 Villa Las Margaritas Rawson'
        ]);
        Store::create([
            'nombre' => 'LEMOS Sucursal',
            'direccion' => 'Lemos y Dr Ortega Villa Krause'
        ]);

    }
}
