<?php

namespace Database\Seeders;

use App\Models\PackingCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PackingCategoryItem;

class PackingCategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackingCategoryItem::create([
            'travel_id' => 1,
            'packing_category_id' => 1,
            'packing_item_id' => 1,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 1,
            'packing_category_id' => 1,
            'packing_item_id' => 2,
        ]);
    }
}
