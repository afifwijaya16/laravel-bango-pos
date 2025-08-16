<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Food'],
            ['name' => 'Side Dishes'],
            ['name' => 'Drink'],
        ];

        DB::table('categories')->insert($categories);
    }
}
