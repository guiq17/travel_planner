<?php

namespace App\Services;

use App\Models\Memo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MemoService
{
    public function memoList($travel_id)
    {
        $memos = DB::table('memos')->where('travel_id', $travel_id)->get();
        return $memos;
    }

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

    public function getMemo($id)
    {
        $memo = DB::table('memos')->where('id', $id)->first();
        return $memo;
    }

    public function updateMemo($note,$url,$id)
    {
        DB::table('memos')->where('id', $id)->update([
            'note' => $note,
            'url' => $url
        ]);
        $memo = $this->getMemo($id);
        return $memo;
    }

    public function deleteMemo($id)
    {
        DB::table('memos')->where('id',$id)->delete();
    }
}