<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $city = $this->resource;

        return [
            'id'         => $city->id,
            'name'       => $city->name,
            'state'      => $city->state,
            'created_at' => $city->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $city->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
