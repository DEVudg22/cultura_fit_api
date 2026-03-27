<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventario;

class InventarioSeeder extends Seeder
{

    public function run(): void
    {
        Inventario::create([
            "suplemento_id" => 4,
            "marca_id" => 7,
            "presentacion" =>"250 gr",
            "stock" => 35,
            "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            "precio" => 140.50
        ]);

        Inventario::create([
            "suplemento_id" => 1,
            "marca_id" => 4,
            "presentacion" =>"100 gr",
            "stock" => 70,
            "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            "precio" => 229.50
        ]);

        Inventario::create([
            "suplemento_id" => 3,
            "marca_id" => 1,
            "presentacion" =>"400 gr",
            "stock" => 65,
            "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            "precio" => 499.50
        ]);

        Inventario::create([
            "suplemento_id" => 2,
            "marca_id" => 5,
            "presentacion" =>"950 gr",
            "stock" => 99,
            "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            "precio" => 799.50
        ]);

        Inventario::create([
            "suplemento_id" => 5,
            "marca_id" => 6,
            "presentacion" =>"300 gr",
            "stock" => 50,
            "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            "precio" => 399.50
        ]);
    }
}
