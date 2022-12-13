<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pablo Pereyra',
            'email' => 'pablopg0694@gmail.com',
            'password' => bcrypt('abcde123'),
            'remember_token' => Str::random(10)
        ])->assignRole('Jefe');

        User::create([
            'name' => 'Carlos Roca',
            'email' => 'carlosroca@gmail.com',
            'password' => bcrypt('1234'),
            'remember_token' => Str::random(10)
        ])->assignRole('Encargado');

        User::create([
            'name' => 'Florencia Lopez',
            'email' => 'florlopez@gmail.com',
            'password' => bcrypt('abcde'),
            'remember_token' => Str::random(10)
        ])->assignRole('Vendedor');

        //User::factory(10)->create();
    }
}
