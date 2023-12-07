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
        $souvenir_items_list = DB::table('souvenir_category_item as category_item')
                        ->where('category_item.travel_id', $travel_id)
                        ->select('items.id as item_id', 'items.name as item_name', 'items.quantity as quantity', 'items.price as price', 'items.url', 'items.contents', 'items.image', 'categories.name as category_name')
                        ->join('souvenir_category_lists as categories', 'category_item.souvenir_category_list_id', 'categories.id')
                        ->join('souvenir_items as items', 'category_item.souvenir_item_id', 'items.id')
                        ->orderBy('categories.id')
                        ->orderBy('items.id')
                        ->get();
        $souvenir_items_list = $souvenir_items_list->groupBy('category_name');

        return $souvenir_items_list;
    }

    public function getSouvenirItem($id)
    {
        $souvenir_item = DB::table('souvenir_items as items')
                        ->where('items.id', $id)
                        ->select('items.name', 'items.quantity', 'items.price', 'items.url', 'items.contents', 'items.image', 'categories.id as category_id', 'categories.name as category_name')
                        ->join('souvenir_category_lists as categories', 'items.souvenir_category_list_id', 'categories.id')
                        ->first();
        
        return $souvenir_item;
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

    public function updateSouvenirItem($request, $id)
    {

        $souvenir = SouvenirItem::find($id);

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
    }

    public function updateSouvenirCategoryItem($request, $id)
    {
        $souvenir_category_item = SouvenirCategoryItem::where('souvenir_item_id', $id)->first();
        
        $souvenir_category_item->souvenir_category_list_id = $request->category_id;
        $souvenir_category_item->save();
    }

    public function deleteSouvenirItem($id)
    {
        DB::table('souvenir_items')->where('id', $id)->delete();
    }

    public function deleteSouvenirCategoryItem($id)
    {
        DB::table('souvenir_category_item')->where('souvenir_item_id', $id)->delete();
    }

    public function calculatePrice($souvenir_list)
{
    $total_amount = 0;

    foreach ($souvenir_list as $souvenir) {
        $souvenir_array = $souvenir->first();
        $amount = $souvenir_array->price * $souvenir_array->quantity;
        $total_amount += $amount;
    }

    return $total_amount;
}
}