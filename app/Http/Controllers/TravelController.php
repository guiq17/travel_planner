<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\Travel;
use App\Services\TravelService;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    private $travel_service;

    public function __construct(TravelService $travel_service)
    {
        $this->travel_service = $travel_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $list = $this->travel_service->getTravelList($user_id);
        return view('itinerary.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itinerary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelRequest $request, TravelService $travel_service)
    {
        $title = $request->input('title');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        DB::beginTransaction();
        try {
            $travel_service->storeTravel($title, $start_date, $end_date);
            DB::commit();
            return redirect()->route('travel.list')->with('success', '正常に登録されました。');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', '登録できませんでした。');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $travel = $this->travel_service->getTravelList($user_id)->where('id', $id)->first();
        return view('itinerary.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, TravelService $travel_service)
    {
        $title = $request->input('title');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        DB::beginTransaction();
        try {
            DB::commit();
            return redirect()->route('travel.list')->with('success', '正常に更新されました。');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', '更新できませんでした。');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        //
    }
}
