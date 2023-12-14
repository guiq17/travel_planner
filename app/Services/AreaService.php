<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AreaService
{
    public function getApiData()
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
        $api_data = $response->json()['areaClasses']['largeClasses'][0][1]['middleClasses'];
        return $api_data;
    }

    public function getCitiesByCode($pref_code)
    {
        $api_data = $this->getApiData();
        $area_data = $this->formatData($api_data);

        $cities = [];
        foreach ($area_data as $prefecture) {
            if ($prefecture['code'] === $pref_code) {
                $cities = $prefecture['cities'];
                break;
            }
        }
        return $cities;
    }

    public function formatData($api_data)
    {
        $area_data = [];
        foreach ($api_data as $item) {
            $prefecture = [
                'code' => $item['middleClass'][0]['middleClassCode'],
                'name' => $item['middleClass'][0]['middleClassName'],
                'cities' => [],
                'regions' => [],
            ];

            foreach ($item['middleClass'][1]['smallClasses'] as $city) {
                $prefecture['cities'][] = [
                    'code' => $city['smallClass'][0]['smallClassCode'],
                    'name' => $city['smallClass'][0]['smallClassName'],
                ];

                if (isset($city['smallClass'][1]['detailClasses'])){
                    foreach ($city['smallClass'][1]['detailClasses'] as $region) {
                        $prefecture['regions'][] = [
                            'code' => $region['detailClass']['detailClassCode'],
                            'name' => $region['detailClass']['detailClassName'],
                        ];
                    }
                }
            }
            $area_data[] = $prefecture;
        }
        return $area_data;
    }
}