<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ScheduleService
{
  public function scheduleList($travel_id)
  {
      $schedule = DB::table('schedules')->where('travel_id', $travel_id)->get();
      return $schedule;
  }

  public function storeSchedule($travel_id,$date, $start_time, $end_time,$event,$url,$icon)
    {
      DB::table('schedules')->insert([
        'travel_id' => $travel_id,
        'date' => $date,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'event' => $event,
        'url' => $url,
        'icon' => $icon,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]);
  }
    
}
