<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Resources\Json\JsonResource;

class CityController extends Controller
{
    public function index(): JsonResource
    {
        $cities = City::orderBy('name')->get();

        return CityResource::collection($cities);
    }
}
