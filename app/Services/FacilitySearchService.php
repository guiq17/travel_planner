<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FacilitySearchService
{
    public function getFacilityData($largeClassCode, $middleClassCode, $smallClassCode, $detailClassCode)
    {
        // apiのエンドポイント
        $facilityApiEndpoint = 'https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426';

        // アプリケーションIDとアフィリエイトID
        $applicationId = '1059175046569150354';
        $affiliateId = '34265887.539eeed4.34265888.b3715a8c';

        // リクエストパラメータ
        $request = Http::get($facilityApiEndpoint, [
            'applicationId' => $applicationId,
            'affiliateId' => $affiliateId,
            'largeClassCode' => $largeClassCode,
            'middleClassCode' => $middleClassCode,
            'smallClassCode' => $smallClassCode,
            'detailClassCode' => $detailClassCode,
        ]);

        $facilities = $request->json();
        return $facilities;
    }
}