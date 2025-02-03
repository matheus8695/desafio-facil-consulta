<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $patient = $this->resource;

        return [
            'id'           => $patient->id,
            'name'         => $patient->name,
            'document'     => $patient->document,
            'phone'        => $patient->phone,
            'created_at'   => $patient->created_at->format('Y-m-d H:i:s'),
            'appointments' => AppointmentResource::collection($this->whenLoaded('appointments')),
        ];
    }
}
