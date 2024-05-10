<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            "name"=>"Sultana",
            "address"=>"Camino de San Pedro 1502, Pedregal de Linda Vista, 67110 Guadalupe, N.L.",
            "contact_phone"=>"8121300850",
        ]);
        Supplier::create([
            "name"=>"Marinela",
            "address"=>"Tecmilagros",
            "contact_phone"=>"8121300851",
        ]);
    }
}
