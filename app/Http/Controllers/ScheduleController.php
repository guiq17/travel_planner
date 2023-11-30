<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Services\ScheduleService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
    public function index($travel_id)
    {
        $schedules = $this->schedule_service->scheduleList($travel_id);
        return view('schedule.index', compact('schedules', 'travel_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($travel_id)
    {
        //新規スケジュール作成画面のビュー
        return view('schedule.create',compact('travel_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request , ScheduleService $schedule_service)
    {
        //post部分
        $travel_id = $request->travel_id;
        $date = $request->date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $event = $request->event;
        $url = $request->url;
        $icon = $request->icon;

        DB::beginTransaction();
        try {
            $schedule_service->storeSchedule($travel_id,$date, $start_time, $end_time,$event,$url,$icon);
            DB::commit();
            return redirect()->route('schedule.create', $travel_id)->with('success', '正常に登録されました。');
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
    public function edit($id,$travel_id)
    {
        $schedule = $this->schedule_service->getSchedule($id);
        return view('schedule.edit', compact('schedule','id','travel_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, $id)
    {
        $travel_id = $request->travel_id;
        $date = $request->date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $event = $request->event;
        $url = $request->url;
        $icon = $request->icon;

        DB::beginTransaction();
        try {
            $schedule = $this->schedule_service->updateSchedule($id,$travel_id,$date, $start_time, $end_time,$event,$url,$icon);
            DB::commit();
            return redirect()->route('schedule.index', compact('schedule','id','travel_id'))->with('success', 'スケジュールが正常に更新されました。');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'スケジュールの登録中にエラーが発生しました。');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //削除
    }
}
