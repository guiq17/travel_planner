<?php

namespace App\Services;

use App\Models\SouvenirItem;
use Illuminate\Support\Facades\DB;
use App\Models\SouvenirCategoryItem;

class SouvenirItemService
{
    public function getSouvenirCategories()
    {
        $souvenir_categories = DB::table('souvenir_category_lists')
                                ->select('id', 'name')
                                ->get();

        return $souvenir_categories;
    }

    public function getSouvenirItems($travel_id)
    {
        $souvenirItemsList = DB::table('souvenir_category_item as category_item')
                        ->where('category_item.travel_id', $travel_id)
                        ->select('items.name as item_name', 'items.quantity', 'items.price', 'items.url', 'items.contents', 'items.image', 'categories.name as category_name')
                        ->join('souvenir_category_lists as categories', 'category_item.souvenir_category_list_id', 'categories.id')
                        ->join('souvenir_items as items', 'category_item.souvenir_item_id', 'items.id')
                        ->orderBy('items.id')
                        ->get();
        $souvenirItemsList = $souvenirItemsList->groupBy('category_name');

        return $souvenirItemsList;
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
        if (request('image')){
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('storage/images', $name);
            $souvenir->image = $name;
        }   
        $souvenir->save();

        return $souvenir;
    }

    public function createSouvenirCategoryItem($request, $souvenir)
    {
        $souvenir_category_item = new SouvenirCategoryItem();

        $souvenir_category_item->travel_id = $request->travel_id;
        $souvenir_category_item->souvenir_category_list_id = $request->category_id;
        $souvenir_category_item->souvenir_item_id = $souvenir->id;
        $souvenir_category_item->save();

        return $souvenir_category_item;
    }
}