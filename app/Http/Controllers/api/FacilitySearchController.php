<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\FacilitySearchService;
use GuzzleHttp\Psr7\HttpFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FacilitySearchController extends Controller
{
    private $facility_search_service;

    public function __construct(FacilitySearchService $facility_search_service)
    {
        $this->facility_search_service = $facility_search_service;
    }

    public function searchFacilities(Request $request, FacilitySearchService $facility_search_service)
    {
        $largeClassCode = $request->country;
        $middleClassCode = $request->prefecture;
        $smallClassCode = $request->city;
        $detailClassCode = $request->region;

        $facilities_data = $facility_search_service->getFacilityData($largeClassCode, $middleClassCode, $smallClassCode, $detailClassCode);
        $paging_info = $facilities_data['pagingInfo'];
        $hotels = $facilities_data['hotels'];

        return view('facilities.index', compact('paging_info', 'hotels'));
    }
}
