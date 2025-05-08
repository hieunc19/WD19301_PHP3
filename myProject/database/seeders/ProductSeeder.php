<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $proSeed = [];
        for($i = 1; $i <= 100; $i++){
            $proSeed[] = [
                'name' => "San pham".$i,
                'price' => rand(1000, 10000),
                'quantity' => rand(10, 100),
                'image' => null,
                'category_id' => rand(1, 10),
                'status' => 1
            ];
        }
        DB::table(table: 'products')->insert($proSeed);

    }
}
