<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SouvenirCategory;

class SouvenirCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SouvenirCategory::create([
            'travel_id' => 1,
            'name' => '自分用',
        ]);
        SouvenirCategory::create([
            'travel_id' => 1,
            'name' => '家族用',
        ]);
        SouvenirCategory::create([
            'travel_id' => 2,
            'name' => '自分用',
        ]);
        SouvenirCategory::create([
            'travel_id' => 2,
            'name' => '家族用',
        ]);
    }
}
