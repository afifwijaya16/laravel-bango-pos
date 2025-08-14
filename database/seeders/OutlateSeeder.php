<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Outlate;

class OutlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outlate::insert([
            [
                'name' => 'Jakarta',
            ],
            [
                'name' => 'Lampung',
            ],
            [
                'name' => 'Palembang',
            ],
            [
                'name' => 'Bali',
            ],
            [
                'name' => 'Bandung',
            ],
        ]);
    }
}
