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
                    ->select('packing_categories.id as packing_category_id', 'packing_categories.name as packing_category_name', 'packing_items.id as packing_item_id', 'packing_items.name as packing_item_name')
                    ->join('packing_categories', 'packing_categories.id', 'packing_category_item.packing_category_id')
                    ->join('packing_items', 'packing_items.id', 'packing_category_item.packing_item_id')
                    ->orderBy('packing_categories.id', 'asc')
                    ->get();

        $list = $list->groupBy('packing_category_name');
        return $list;
    }

    public function getPackingCategories()
    {
        $packing_categories = DB::table('packing_categories')
                            ->orderBy('id', 'asc')
                            ->get();
        return $packing_categories;
    }

    public function storePackingItem($packing_category_id, $packing_item_name)
    {
        DB::table('packing_items')
            ->insert([
                'packing_category_id' => $packing_category_id,
                'name' => $packing_item_name,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
    }

    public function storePackingCategoryItem($travel_id, $packing_category_id, $packing_item_name)
    {
        // 新規作成した持ち物のレコードを取得
        $new_item = DB::table(('packing_items'))
                                ->latest('id')
                                ->first();
        $packing_item_id = $new_item->id;

        DB::table('packing_category_item')
            ->insert([
                'travel_id' => $travel_id,
                'packing_category_id' => $packing_category_id,
                'packing_item_id' => $packing_item_id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
    }

    public function getCategoryId($packing_item_id, $travel_id)
    {
        $packing_category_id = DB::table('packing_category_item')
                        ->where('packing_item_id', $packing_item_id)
                        ->where('travel_id', $travel_id)
                        ->value('packing_category_id');
        return $packing_category_id;
    }

    public function getItemName($packing_item_id)
    {
        $packing_item_name = DB::table('packing_items')
                        ->where('id', $packing_item_id)
                        ->value('name');
        return $packing_item_name;
    }

    public function updatePackingItem($packing_item_id, $packing_category_id, $packing_item_name)
    {
        DB::table('packing_items')
            ->where('id', $packing_item_id)
            ->update([
                'packing_category_id' => $packing_category_id,
                'name' => $packing_item_name,
                'updated_at' => \Carbon\Carbon::now(),
            ]);
    }

    public function updatePackingCategoryItem($travel_id, $packing_item_id, $packing_category_id)
    {
        DB::table('packing_category_item')
            ->where('travel_id', $travel_id)
            ->where('packing_item_id', $packing_item_id)
            ->update([
                'packing_category_id' => $packing_category_id,
                'updated_at' => \Carbon\Carbon::now(),
            ]);
    }
    
    public function destroyPackingCategoryItem($packing_item_id, $travel_id)
    {
        DB::table('packing_category_item')
            ->where('travel_id', $travel_id)
            ->where('packing_item_id', $packing_item_id)
            ->delete();
    }

    public function destroyPackingItem($packing_item_id)
    {
        DB::table('packing_items')
        ->where('id', $packing_item_id)
            ->delete();
    }
}