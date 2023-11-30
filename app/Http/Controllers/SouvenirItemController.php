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
    public function index($travel_id)
    {
        $souvenir_list = $this->souvenirItemService->getSouvenirItems($travel_id);

        return view('souvenir.index', compact('travel_id', 'souvenir_list'));
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
    public function edit($id, $travel_id)
    {
        $souvenir_categories = $this->souvenirItemService->getSouvenirCategories();
        $souvenir_item = $this->souvenirItemService->getSouvenirItem($id);

        return view('souvenir.edit', compact('souvenir_item','souvenir_categories', 'travel_id', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSouvenirItemRequest $request, $id)
    {
        $travel_id = $request->travel_id;
        DB::beginTransaction();
        try {
            $this->souvenirItemService->updateSouvenirItem($request, $id);
            $souvenir = $this->souvenirItemService->getSouvenirItem($id);
            $this->souvenirItemService->updateSouvenirCategoryItem($request, $id, $souvenir);
            DB::commit();
            return redirect()->route('souvenir.index', $travel_id)->with('success', 'お土産が正常に更新されました。');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'お土産の登録中にエラーが発生しました。');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SouvenirItem $souvenirItem)
    {
        //
    }
}
