<?php

namespace App\Http\Controllers;

use Log;
use App\Models\SouvenirItem;
use Illuminate\Support\Facades\DB;
use App\Services\SouvenirItemService;
use App\Http\Requests\StoreSouvenirItemRequest;
use App\Http\Requests\UpdateSouvenirItemRequest;

class SouvenirItemController extends Controller
{
    private $souvenirItemService;

    public function __construct(SouvenirItemService $souvenir_item_service)
    {
        $this->souvenirItemService = $souvenir_item_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($travel_id)
    {
        $souvenir_categories = $this->souvenirItemService->getSouvenirCategories();

        return view('souvenir.create', compact('travel_id', 'souvenir_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSouvenirItemRequest $request)
    {
        $travel_id = $request->travel_id;
        DB::beginTransaction();
        try {
            $souvenir = $this->souvenirItemService->createSouvenirItem($request);
            $this->souvenirItemService->createSouvenirCategoryItem($request, $souvenir);
            DB::commit();
            return redirect()->route('souvenir.create', $travel_id)->with('success', 'お土産を登録しました。');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', '登録できませんでした。');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SouvenirItem $souvenirItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SouvenirItem $souvenirItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSouvenirItemRequest $request, SouvenirItem $souvenirItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SouvenirItem $souvenirItem)
    {
        //
    }
}
