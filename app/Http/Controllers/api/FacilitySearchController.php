<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\HttpFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FacilitySearchController extends Controller
{
    public function searchFacilities($keyword)
    {
        // apiのエンドポイント
        $apiEndpoint = 'https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426';

        // アプリケーションIDとアフィリエイトID
        $applicationId = '1059175046569150354';
        $affiliateId = '34265887.539eeed4.34265888.b3715a8c';

        // リクエストパラメータ
        $request = Http::get($apiEndpoint, [
            'applicationId' => $applicationId,
            'affiliateId' => $affiliateId,
            'keyword' => $keyword,
        ]);

        $response_data = $request->json();

        return view('facilities.index', ['facilities' => $response_data['hotels']]);
    }
}
