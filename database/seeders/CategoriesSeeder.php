<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            [
                'category_name' => 'High',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Low',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
