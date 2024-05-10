<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            SupplierSeeder::class,
            InventorySeeder::class,
            InventoryMovementSeeder::class,
            InventoryLogSeeder::class,
            ModuleSeeder::class,
            OperationSeeder::class,
        ]);
    }
}
