<?php

namespace App\Services;

use App\Models\Travel;
use Illuminate\Support\Facades\DB;

class TravelService
{
    public function getTravelList($id)
    {
        $list = DB::table('travel')
                            ->where('user_id', $id)
                            ->whereNull('deleted_at')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return $list;
    }
}