<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackingItemRequest;
use App\Http\Requests\UpdatePackingItemRequest;
use App\Models\PackingItem;

class PackingItemController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackingItemRequest $request)
    {
        //
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
    public function edit(PackingItem $packingItem)
    {
        //
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
