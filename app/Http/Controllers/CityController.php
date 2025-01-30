<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Resources\Json\JsonResource;

class CityController extends Controller
{
    public function __invoke(): JsonResource
    {
        $cities = City::query()
            ->when(request()->has('nome'), function ($query) {
                $query->where('name', 'like', '%' . request('nome') . '%');
            })
            ->orderBy('name')
            ->get();

        return CityResource::collection($cities);
    }
}
