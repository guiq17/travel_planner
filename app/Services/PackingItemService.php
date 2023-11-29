<?php

namespace App\Services;

use App\Models\PackingItem;
use Illuminate\Support\Facades\DB;

class PackingItemService
{
    public function getPackingCategories()
    {
        $packing_categories = DB::table('packing_categories')
                            ->orderBy('id', 'asc')
                            ->get();
        return $packing_categories;
    }

    public function storePackingItem($category_id, $name)
    {
        DB::table('packing_items')
            ->insert([
                'packing_category_id' => $category_id,
                'name' => $name,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
    }

    public function storePackingCategoryItem($travel_id, $category_id, $name)
    {
        $item_id = DB::table('packing_items')
                    ->where('name', $name)
                    ->value('id');

        DB::table('packing_category_item')
            ->insert([
                'travel_id' => $travel_id,
                'packing_category_id' => $category_id,
                'packing_item_id' => $item_id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
    }
}