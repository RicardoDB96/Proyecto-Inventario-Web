<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name"=>"Nieve vainilla",
            "image"=> 'img/Nieve de Vainilla.png',
            "description"=>"La nieve de vainilla está hecha de leche, crema, azúcar y extracto de vainilla.",
            "base_price"=>100,
            "base_cost"=>75,
            "category_id"=>1,
        ]);

        Product::create([
            "name"=>"Nieve fresa",
            "image"=>'img/Nieve de Fresa.png',
            "description"=>"La nieve de fresa está hecha de leche, crema, azúcar y puré de fresas.",
            "base_price"=>90,
            "base_cost"=>60,
            "category_id"=>1,
        ]);

        Product::create([
            "name"=>"Nieve chocolate",
            "image"=>'img/Nieve de Chocolate.png',
            "description"=>"La nieve de chocolate está hecha de leche, crema, azúcar y cacao en polvo o chocolate derretido.",
            "base_price"=>110,
            "base_cost"=>90,
            "category_id"=>1,
        ]);
    }
}