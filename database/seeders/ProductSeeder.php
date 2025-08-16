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
        $products = [
            // Category 1 (Food) - Previous items
            [
                'outlet_id' => 1,
                'category_id' => 1,
                'name' => 'Nasi Goreng Kambing',
                'sale_price' => 45000,
                'cost_price' => 30000,
                'stock' => 20,
                'description' => 'Nasi goreng dengan daging kambing pilihan',
            ],
            [
                'outlet_id' => 1,
                'category_id' => 1,
                'name' => 'Nasi Goreng Pete',
                'sale_price' => 32000,
                'cost_price' => 22000,
                'stock' => 10,
                'description' => 'Nasi goreng dengan pete khas',
            ],
            [
                'outlet_id' => 1,
                'category_id' => 1,
                'name' => 'Nasi Goreng Babat',
                'sale_price' => 40000,
                'cost_price' => 28000,
                'stock' => 20,
                'description' => 'Nasi goreng dengan babat sapi',
            ],
            [
                'outlet_id' => 1,
                'category_id' => 1,
                'name' => 'Mie Ayam Jamur',
                'sale_price' => 25000,
                'cost_price' => 18000,
                'stock' => 20,
                'description' => 'Mie ayam dengan jamur pilihan',
            ],
            [
                'outlet_id' => 1,
                'category_id' => 1,
                'name' => 'Kwetiau Goreng Seafood',
                'sale_price' => 40000,
                'cost_price' => 28000,
                'stock' => 20,
                'description' => 'Kwetiau goreng dengan campuran seafood',
            ],

            // Category 2 (Side Dishes) - Previous item
            [
                'outlet_id' => 1,
                'category_id' => 2,
                'name' => 'Ayam Bakar Kalasan',
                'sale_price' => 17000,
                'cost_price' => 12000,
                'stock' => 50,
                'description' => 'Ayam bakar dengan bumbu khas Kalasan',
            ],

            // Category 3 (Drink) - New items
            [
                'outlet_id' => 1,
                'category_id' => 3,
                'name' => 'Es Teh Manis',
                'sale_price' => 7000,
                'cost_price' => 3000,
                'stock' => 100,
                'description' => 'Es teh manis segar',
            ],
            [
                'outlet_id' => 1,
                'category_id' => 3,
                'name' => 'Es Kopi Susu Gula Aren',
                'sale_price' => 15000,
                'cost_price' => 7000,
                'stock' => 50,
                'description' => 'Kopi susu dengan gula aren asli',
            ],
        ];

        DB::table('products')->insert($products);
    }
}
