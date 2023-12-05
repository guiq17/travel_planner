<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ScheduleService
{
  public function scheduleList($travel_id)
  {
      $schedule = DB::table('schedules')->where('travel_id', $travel_id)->whereNull('deleted_at')->orderBy('id', 'asc')->get();
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

  public function getSchedule($id)
    {
        $schedule = DB::table('schedules')->where('id', $id)->first();
        return $schedule;
    }

    public function updateSchedule($id,$travel_id,$date, $start_time, $end_time,$event,$url,$icon)
    {
        DB::table('schedules')->where('id', $id)->update([
          'date' => $date,
          'start_time' => $start_time,
          'end_time' => $end_time,
          'event' => $event,
          'url' => $url,
          'icon' => $icon,
          'updated_at' => Carbon::now()
        ]);
        $schedule = $this->getSchedule($id);
        return $schedule;
    }    
}
