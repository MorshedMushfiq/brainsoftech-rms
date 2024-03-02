<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($data=1;$data<=20;$data++){
            DB::table("posts")->insert([
                "title"=> "this is title".$data,
                "description" => "this is description demo from seed".$data,
                "status" => 1
            ]);
        }
    }
}
