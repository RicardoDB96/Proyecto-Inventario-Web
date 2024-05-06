<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InventoryMovement;

class InventoryMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InventoryMovement::create([
            "name"=>"Compra",
        ]);

        InventoryMovement::create([
            "name"=>"Venta",
        ]);
    }
}
