<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Services\AreaService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\View\Components\AreaComponent;
use Exception;
use Illuminate\Support\Facades\Log;

class AreaController extends Controller
{
    private $area_service;

    public function __construct(AreaService $area_service)
    {
        $this->area_service = $area_service;
    }

    public function getAreas(AreaService $area_service)
    {
        try {
            $api_data = $area_service->getApiData();
            $areaData = $area_service->formatData();
            return view('facilities.index', [
                'areaComponent' => AreaComponent::class,
                'areaData' => $areaData,
            ]);
        } catch (Exception $e) {
            Log::error('API call failed: ' . $e->getMessage());
        }
    }

    public function getCities(Request $request, AreaService $area_service)
    {
        $pref_code = $request->pref_code;
        $cities = $area_service->getCitiesByCode($pref_code);
        return response()->json(['cities' => $cities]);
    }

    public function getRegions(Request $request, AreaService $area_service)
    {
        $city_code = $request->city_code;
        $regions = $area_service->getRegionsByCode($city_code);
        return response()->json(['regions' => $regions]);
    }
}
