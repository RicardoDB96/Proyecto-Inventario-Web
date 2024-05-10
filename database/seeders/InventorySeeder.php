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
            "amount"=> 0,
            "product_id"=>1,
            "supplier_id"=>1,
        ]);
        Inventory::create([
            "amount"=> 0,
            "product_id"=>1,
            "supplier_id"=>2,
        ]);

        Inventory::create([
            "amount"=> 0,
            "product_id"=>2,
            "supplier_id"=>2,
        ]);

        Inventory::create([
            "amount"=> 0,
            "product_id"=>3,
            "supplier_id"=>2,
        ]);

        Inventory::create([
            "amount"=> 0,
            "product_id"=>3,
            "supplier_id"=>1,
        ]);
    }
}
