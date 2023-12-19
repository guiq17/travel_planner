<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FacilitySearchService
{
    public function getAreaData()
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

    public function formatAreaData()
    {
        $api_data = $this->getAreaData();
        $area_data = [];
        foreach ($api_data as $item) {
            $prefecture = [
                'code' => $item['middleClass'][0]['middleClassCode'],
                'name' => $item['middleClass'][0]['middleClassName'],
                'cities' => [],
            ];

            foreach ($item['middleClass'][1]['smallClasses'] as $city) {
                $city_data = [
                    'code' => $city['smallClass'][0]['smallClassCode'],
                    'name' => $city['smallClass'][0]['smallClassName'],
                    'regions' => [],
                ];

                if (isset($city['smallClass'][1]['detailClasses'])) {
                    foreach ($city['smallClass'][1]['detailClasses'] as $region) {
                        $city_data['regions'][] = [
                            'code' => $region['detailClass']['detailClassCode'],
                            'name' => $region['detailClass']['detailClassName'],
                        ];
                    }
                }
                $prefecture['cities'][] = $city_data;
            }
            $area_data[] = $prefecture;
        }
        return $area_data;
    }

    public function getCitiesByCode($pref_code)
    {
        $area_data = $this->formatAreaData();

        $cities = [];
        foreach ($area_data as $prefecture) {
            if ($prefecture['code'] === $pref_code) {
                $cities = $prefecture['cities'];
                break;
            }
        }
        return $cities;
    }

    public function getRegionsByCode($city_code)
    {
        $area_data = $this->formatAreaData();

        $regions = [];
        foreach ($area_data as $prefecture) {
            foreach ($prefecture['cities'] as $city) {
                if ($city['code'] === $city_code) {
                    $regions = $city['regions'];
                    break;
                }
            }
            if (!empty($regions)) {
                break;
            }
        }
        return $regions;
    }

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

    public function formatFacilityData($api_data)
    {
        $hotel_info = [];
        foreach ($api_data['hotels'] as $item) {
            $basic = $item['hotel'][0]['hotelBasicInfo'];
            if (isset($item['hotel'][0]['hotelBasicInfo'])) {
                $basic_info = [
                    'No' => $basic['hotelNo'],
                    'name' => $basic['hotelName'],
                    'special' => $basic['hotelSpecial'],
                    'postalCode' => $basic['postalCode'],
                    'address' => $basic['address1'].$basic['address2'],
                    'access' => $basic['access'],
                ];
            }
            
            if (isset($item['hotel'][1]['hotelRatingInfo'])) {
                $rating_info = [
                    'service' => $item['hotel'][1]['hotelRatingInfo']['serviceAverage'],
                    'location' => $item['hotel'][1]['hotelRatingInfo']['locationAverage'],
                    'room' => $item['hotel'][1]['hotelRatingInfo']['roomAverage'],
                    'equipment' => $item['hotel'][1]['hotelRatingInfo']['equipmentAverage'],
                    'bath' => $item['hotel'][1]['hotelRatingInfo']['bathAverage'],
                    'meal' => $item['hotel'][1]['hotelRatingInfo']['mealAverage'],
                ];
            }

            $hotel_info[] = [
                'basic_info' => $basic_info,
                'rating_info' => $rating_info,
            ];
        }
        return $hotel_info;
    }
}