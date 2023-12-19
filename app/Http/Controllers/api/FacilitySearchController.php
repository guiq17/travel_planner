<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\FacilitySearchService;
use Exception;
use GuzzleHttp\Psr7\HttpFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FacilitySearchController extends Controller
{
    private $facility_search_service;

    public function __construct(FacilitySearchService $facility_search_service)
    {
        $this->facility_search_service = $facility_search_service;
    }

    public function getCities(Request $request, FacilitySearchService $facility_search_service)
    {
        $pref_code = $request->pref_code;
        $cities = $facility_search_service->getCitiesByCode($pref_code);
        return response()->json(['cities' => $cities]);
    }

    public function getRegions(Request $request, FacilitySearchService $facility_search_service)
    {
        $city_code = $request->city_code;
        $regions = $facility_search_service->getRegionsByCode($city_code);
        return response()->json(['regions' => $regions]);
    }

    public function searchFacilities(Request $request, FacilitySearchService $facility_search_service)
    {
        $largeClassCode = $request->country;
        $middleClassCode = $request->prefecture;
        $smallClassCode = $request->city;
        $detailClassCode = $request->region;

        try {
            $area_data = $facility_search_service->formatAreaData();
            $facilities_data = $facility_search_service->getFacilityData($largeClassCode, $middleClassCode, $smallClassCode, $detailClassCode);
            if(isset($facilities_data['hotels'])){
                $hotel_info = $facilities_data['hotels'];
                $paging_info = $facilities_data['pagingInfo'];
            } else {
                $hotel_info = [];
                $paging_info = [];
            }
            return view('facilities.index', compact('area_data', 'hotel_info', 'paging_info'));
        } catch (Exception $e) {
            Log::error('API call failed: ' . $e->getMessage());
        }
    }
}
