<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>"Eduardo",
            "last_name"=>"De La cRUZ",
            "role_id"=>1,
            "email"=>"laoo122@gm.com",
            "password"=>Hash::make("1233"),
        ]);
    }
}
