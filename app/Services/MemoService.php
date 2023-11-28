<?php

namespace App\Services;

use App\Models\Memo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MemoService
{
    public function createMemo($travel_id,$note,$url) 
    {
        DB::table('memos')->insert([
            'travel_id' => $travel_id,
            'note' => $note,
            'url' => $url,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}