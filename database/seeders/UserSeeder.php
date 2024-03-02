<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("users")->insert([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => "asdfghjkl",
            "user_roles" => "admin",
        ]);

        DB::table("users")->insert([
            "name" => "super admin",
            "email" => "superadmin@gmail.com",
            "password" => "asdfghjkl",
            "user_roles" => "super admin",
        ]);


       
        DB::table("users")->insert([
            "name" => "user2",
            "email" => "user2@gmail.com",
            "password" => "asdfghjkl",
            "user_roles" => "user",
        ]);
      
    }
}
