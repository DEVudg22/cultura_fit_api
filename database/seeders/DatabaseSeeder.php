<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Database\SuplementoSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            //SuplementoSeeder::class,
            //MarcaSeeder::class,
            //InventarioSeeder::class

        ]);

       
    }
}
