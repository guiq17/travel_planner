<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Services\ScheduleService;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    // private $schedule_service;

    // public function __construct(ScheduleService $schedule_service)
    // {
    //     $this->schedule_service = $schedule_service;
    // }
    //上記書くとエラーになる
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
    public function store(StoreScheduleRequest $request)
    {
        //post部分
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
