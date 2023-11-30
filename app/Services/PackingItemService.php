<?php

namespace App\Services;

use App\Models\PackingItem;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PackingItemService
{
    public function getCategoriesItemsByTravelId($travel_id)
    {
        $list = DB::table('packing_category_item')
                    ->where('packing_category_item.travel_id', $travel_id)
                    ->select('packing_categories.id as category_id', 'packing_categories.name as category_name','packing_items.id as item_id', 'packing_items.name as item_name')
                    ->join('packing_categories', 'packing_categories.id', 'packing_category_item.packing_category_id')
                    ->join('packing_items', 'packing_items.id', 'packing_category_item.packing_item_id')
                    ->orderBy('packing_items.id', 'asc')
                    ->get();

        $list = $list->groupBy('category_name');
        return $list;
    }

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

    public function getCategoryId($travel_id, $item_id)
    {
        dd($travel_id, $item_id);
        $category_id = DB::table('packing_category_item')
                        ->where('travel_id', $travel_id)
                        ->where('packing_item_id', $item_id)
                        ->value('packing_category_id');
        return $category_id;
    }

    public function getItemName($item_id)
    {
        $item_name = DB::table('packing_items')
                        ->where('id', $item_id)
                        ->value('name');
        return $item_name;
    }
}