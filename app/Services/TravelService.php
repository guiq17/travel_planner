<?php

namespace App\Services;

use App\Models\Travel;
use Illuminate\Support\Facades\DB;

class TravelService
{
    public function getTravelList($user_id)
    {
        $list = DB::table('travel')
                            ->where('user_id', $user_id)
                            ->whereNull('deleted_at')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return $list;
    }

    public function storeTravel($title, $start_date, $end_date)
    {
        $user = auth()->user();
        $user_id = $user->id;
        $travel = new Travel();
        $travel->user_id = $user_id;
        $travel->title = $title;
        $travel->start_date = $start_date;
        $travel->end_date = $end_date;
        $travel->save();
    }

    public function updateTravel($data)
    {
        DB::table('travel')
            ->where('id', $data['id'])
            ->update([
                'title' => $data['title'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);
    }

    public function destroyTravel($id)
    {
        DB::table('travel')
            ->where('id', $id)
            ->update([
                'deleted_at' => \Carbon\Carbon::now(),
            ]);
    }

    public function destroySchedule($travel_id)
    {
        DB::table('schedules')
            ->where('travel_id', $travel_id)
            ->update([
                'deleted_at' => \Carbon\Carbon::now(),
            ]);
    }
}