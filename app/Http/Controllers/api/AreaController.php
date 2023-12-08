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
        $areas = $response->json()['areaClasses']['largeClasses'][0][1];
        // dd($areas);
        
        foreach($areas['middleClasses'] as $middleClassGroup){
            foreach($middleClassGroup as $middleClass){
                if(isset($middleClass['middleClassCode']) && isset($middleClass['middleClassName'])){
                    $middleClassCode[] = $middleClass['middleClassCode'];
                    $middleClassName[] = $middleClass['middleClassName'];
                    dd($middleClassCode, $middleClassName);
                }
            }
        }

        return view('facilities.index', compact('areas'));
    }
}
