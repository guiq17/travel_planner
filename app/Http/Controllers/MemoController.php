<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemoRequest;
use App\Http\Requests\UpdateMemoRequest;
use App\Models\Memo;
use App\Services\MemoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MemoController extends Controller
{
    private $memo_service;
    public function __construct(MemoService $memo_service) {
        $this->memo_service = $memo_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($travel_id)
    {
        return view('memos.create',compact('travel_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemoRequest $request)
    {
        $travel_id = $request->travel_id;
        $note = $request->note;
        $url = $request->url;
        DB::beginTransaction();
        try {
            $this->memo_service->createMemo($travel_id,$note,$url);
            DB::commit();
            return redirect()->route('memo.create', $travel_id)->with('success', '正常に登録されました。');
        }catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', '登録できませんでした。');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Memo $memo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memo $memo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemoRequest $request, Memo $memo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memo $memo)
    {
        //
    }
}
