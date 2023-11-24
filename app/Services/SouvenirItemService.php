<?php

namespace App\Services;

use App\Models\SouvenirItem;
use Illuminate\Support\Facades\DB;

class SouvenirItemService
{
    public function getSouvenirCategories()
    {
        $souvenir_categories = DB::table('souvenir_category_lists')
                                ->select('name')
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
        SouvenirItem::create([
            'souvenir_category_id',
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'url' => $request->url,
            'contents' => $request->contents,
            'image'
        ]);
    }
}