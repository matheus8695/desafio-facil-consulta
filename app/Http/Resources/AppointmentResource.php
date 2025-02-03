<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $appointment = $this->resource;

        return [
            'id'     => $appointment->id,
            'date'   => $appointment->date,
            'doctor' => [
                'id'        => $appointment->doctor->id,
                'name'      => $appointment->doctor->name,
                'specialty' => $appointment->doctor->specialty,
            ],
        ];
    }
}
