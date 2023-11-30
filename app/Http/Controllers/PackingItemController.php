<?php

namespace App\Http\Controllers;

use App\Models\PackingItem;
use Illuminate\Support\Facades\DB;
use App\Services\PackingItemService;
use App\Http\Requests\StorePackingItemRequest;
use App\Http\Requests\UpdatePackingItemRequest;


class PackingItemController extends Controller
{
    private $packing_item_service;
    public function __construct(PackingItemService $packing_item_service)
    {
        $this->packing_item_service = $packing_item_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($travel_id)
    {
        $list = $this->packing_item_service->getCategoriesItemsByTravelId($travel_id);
        return view('packing.index', compact('travel_id', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($travel_id)
    {
        $categories = $this->packing_item_service->getPackingCategories();
        return view('packing.create', compact('travel_id', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackingItemRequest $request, PackingItemService $packing_item_service)
    {
        $travel_id = $request->travel_id;
        $packing_category_id = $request->packing_category_id;
        $packing_item_name = $request->packing_item_name;

        DB::beginTransaction();
        try {
            $packing_item_service->storePackingItem($packing_category_id, $packing_item_name);
            $packing_item_service->storePackingCategoryItem($travel_id, $packing_category_id, $packing_item_name);
            DB::commit();
            return redirect()->route('packing.create', ['travel_id' => $travel_id])->with('success', '正常に登録されました。');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', '登録できませんでした。');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PackingItem $packingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($packing_item_id, $travel_id)
    {
        $categories = $this->packing_item_service->getPackingCategories();
        $packing_category_id = $this->packing_item_service->getCategoryId($packing_item_id, $travel_id);
        $packing_item_name = $this->packing_item_service->getItemName($packing_item_id);
        return view('packing.edit', compact('travel_id', 'packing_item_id', 'categories', 'packing_category_id', 'packing_item_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackingItemRequest $request, PackingItem $packingItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackingItem $packingItem)
    {
        //
    }
}
