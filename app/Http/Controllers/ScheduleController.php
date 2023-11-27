<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Services\ScheduleService;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    private $schedule_service;

    public function __construct(ScheduleService $schedule_service)
    {
        $this->schedule_service = $schedule_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //スケジュール一覧表示
        return view('schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //新規スケジュール作成画面のビュー
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request , ScheduleService $schedule_service)
    {
        //post部分
        $date = $request->input('date');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $event = $request->input('event');
        $url = $request->input('url');
        $image = $request->input('image');
        $icon = $request->input('icon');

        DB::beginTransaction();
        try {
            $schedule_service->storeSchedule($date, $start_time, $end_time,$event,$url,$image,$icon);
            DB::commit();
            return redirect()->route('schedule.index')->with('success', '正常に登録されました。');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', '登録できませんでした。');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //編集のビュー
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //編集のポスト
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //削除
    }
}
