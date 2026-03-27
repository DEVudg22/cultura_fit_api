<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        Marca::create([
            "nombre_marca" => "GNC"
        ]);
        Marca::create([
            "nombre_marca" => "Optimum Nutrition"
        ]);
        Marca::create([
            "nombre_marca" => "MyProtein"
        ]);
        Marca::create([
            "nombre_marca" => "Dymatize"
        ]);
        Marca::create([
            "nombre_marca" => "Garden of Life"
        ]);
        Marca::create([
            "nombre_marca" => "MDN Sports"
        ]);
        Marca::create([
            "nombre_marca" => "Olimpo"
        ]);
    }
}
