<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleService
{
  public function storeSchedule($date, $start_time, $end_time,$event,$url,$image,$icon)
    {
        $user = auth()->user();
        $schedule = new Schedule();
        
        $schedule->date = $date;
        $schedule->start_time = $start_time;
        $schedule->end_time = $end_time;
        $schedule->event = $event;
        $schedule->url = $url;
        $schedule->image = $image;
        $schedule->icon = $icon;
        $schedule->save();
    }
}
