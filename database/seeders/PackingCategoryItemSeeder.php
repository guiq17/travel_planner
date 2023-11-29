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
        PackingCategoryItem::create([
            'travel_id' => 1,
            'packing_category_id' => 2,
            'packing_item_id' => 3,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 1,
            'packing_category_id' => 2,
            'packing_item_id' => 4,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 1,
            'packing_category_id' => 3,
            'packing_item_id' => 5,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 1,
            'packing_category_id' => 3,
            'packing_item_id' => 6,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 2,
            'packing_category_id' => 4,
            'packing_item_id' => 7,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 2,
            'packing_category_id' => 4,
            'packing_item_id' => 8,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 2,
            'packing_category_id' => 5,
            'packing_item_id' => 9,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 2,
            'packing_category_id' => 5,
            'packing_item_id' => 10,
        ]);
        PackingCategoryItem::create([
            'travel_id' => 2,
            'packing_category_id' => 6,
            'packing_item_id' => 11,
        ]);
    }
}
