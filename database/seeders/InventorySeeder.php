<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create([
            "amount"=> 100,
            "product_id"=>1,
        ]);

        Inventory::create([
            "amount"=> 120,
            "product_id"=>3,
        ]);

        Inventory::create([
            "amount"=> 140,
            "product_id"=>2,
        ]);
    }
}
