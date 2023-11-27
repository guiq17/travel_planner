<?php

namespace App\Services;

use App\Models\SouvenirItem;
use Illuminate\Support\Facades\DB;

class SouvenirItemService
{
    public function getSouvenirCategories()
    {
        $souvenir_categories = DB::table('souvenir_category_lists')
                                ->select('id', 'name')
                                ->get();

        return $souvenir_categories;
    }

    public function getSouvenirCategoryWithSouvenirItem()
    {
        $souvenirItem = DB::table('souvenir_items as items')
                        ->select('items.name', 'categories.name')
                        ->join('souvenir_categories as categories', 'items.souvenir_category_id', 'categories.id')
                        ->get();
        return $souvenirItem;
    }

    public function createSouvenirItem($request)
    {
        $souvenir = new SouvenirItem();

            $souvenir->souvenir_category_list_id = $request->category_id;
            $souvenir->name = $request->souvenir_name;
            $souvenir->quantity = $request->quantity;
            $souvenir->price = $request->price;
            $souvenir->url = $request->url;
            $souvenir->contents = $request->contents;
            // 'image'
            $souvenir->save();

            return $souvenir;
    }
}