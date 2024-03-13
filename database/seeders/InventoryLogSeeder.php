<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InventoryLog;

class InventoryLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InventoryLog::create([
            "amount"=> 100,
            "delta_amount"=>100 ,
            "movement_id"=>1,
            "inventory_id"=>1,
        ]);
    }
}
