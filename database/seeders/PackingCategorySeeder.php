<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PackingCategory;

class PackingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackingCategory::create([
            'travel_id' => 1,
            'name' => '貴重品',
        ]);
        PackingCategory::create([
            'travel_id' => 1,
            'name' => '交通',
        ]);
        PackingCategory::create([
            'travel_id' => 2,
            'name' => '貴重品',
        ]);
        PackingCategory::create([
            'travel_id' => 2,
            'name' => '交通',
        ]);
    }
}
