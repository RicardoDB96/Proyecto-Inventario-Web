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
            "description"=>"La nieve de vainilla está hecha de leche, crema, azúcar y extracto de vainilla.",
            "base_price"=>100,
            "base_cost"=>100,
            "category_id"=>1,
        ]);

        Product::create([
            "name"=>"Nieve fresa",
            "description"=>"La nieve de fresa está hecha de leche, crema, azúcar y puré de fresas.",
            "base_price"=>100,
            "base_cost"=>100,
            "category_id"=>1,
        ]);

        Product::create([
            "name"=>"Nieve chocolate",
            "description"=>"La nieve de chocolate está hecha de leche, crema, azúcar y cacao en polvo o chocolate derretido.",
            "base_price"=>100,
            "base_cost"=>100,
            "category_id"=>1,
        ]);
    }
}
