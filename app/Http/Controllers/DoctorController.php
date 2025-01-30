<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorController extends Controller
{
    public function __invoke(): JsonResource
    {
        $doctors = Doctor::query()
            ->when(request()->has('nome'), function ($query) {
                $query->where('name', 'like', '%' . request('nome') . '%');
            })
            ->orderByRaw("TRIM(BOTH '.' FROM REGEXP_REPLACE(name, '^Dr(a)?\.\s*', ''))")
            ->get();

        return DoctorResource::collection($doctors);
    }
}
