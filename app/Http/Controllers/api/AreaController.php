<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    public function getAreas()
    {
        // apiのエンドポイント
        $areaApiEndpoint = 'https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024';

        // アプリケーションIDとアフィリエイトID
        $applicationId = '1059175046569150354';
        $affiliateId = '34265887.539eeed4.34265888.b3715a8c';

        // リクエストパラメータ
        $response = Http::get($areaApiEndpoint, [
            'format' => 'json',
            'formatVersion' => '2',
            'applicationId' => $applicationId,
        ]);

        // レスポンスデータをjson形式で取得
        $areas = $response->json()['areaClasses']['largeClasses'][0];
        // dd($areas);
        // dd($areas[1]['middleClasses']);
        // dd($areas[1]['middleClasses'][0]['middleClass'][0]['middleClassName']);
        // dd($areas[0]['largeClassCode']);
        // dd($areas[0]['largeClassName']);

        return view('facilities.index', compact('areas'));
    }
}
