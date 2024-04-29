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
        User::create([
            "name"=>"Ricardo",
            "last_name"=>"Domínguez Bermejo",
            "role_id"=>1,
            "email"=>"rdb@gmail.com",
            "password"=>Hash::make("12345"),
        ]);
        User::create([
            "name"=>"Rodrigo",
            "last_name"=>"Tijerina",
            "role_id"=>1,
            "email"=>"rt@gmail.com",
            "password"=>Hash::make("1234"),
        ]);
        User::create([
            "name"=>"Joel",
            "last_name"=>"Aldana",
            "role_id"=>1,
            "email"=>"ja@gmail.com",
            "password"=>Hash::make("12345678"),
        ]);
    }
}
