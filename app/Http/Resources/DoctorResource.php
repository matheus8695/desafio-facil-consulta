<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $doctor = $this->resource;

        return [
            'id'         => $doctor->id,
            'name'       => $doctor->name,
            'specialty'  => $doctor->specialty,
            'city'       => $doctor->city->name,
            'created_at' => $doctor->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $doctor->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
