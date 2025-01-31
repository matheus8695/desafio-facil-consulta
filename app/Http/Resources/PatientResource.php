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
            'appointments' => $patient->when(
                $patient->appointments->isNotEmpty(),
                $patient->appointments->map(fn ($appointment) => [
                    'id'     => $appointment->id,
                    'date'   => $appointment->date,
                    'doctor' => [
                        'id'        => $appointment->doctor->id,
                        'name'      => $appointment->doctor->name,
                        'specialty' => $appointment->doctor->specialty,
                    ],
                ])
            ),
        ];
    }
}
