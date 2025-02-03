<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorController extends Controller
{
    public function index(int $cityId = null): JsonResource
    {
        $doctors = Doctor::query()
            ->when(
                request()->has('nome'),
                fn (Builder $q) => $q->where('name', 'like', '%' . request('nome') . '%')
            )
            ->when($cityId, function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->orderByNameWithoutPrefix()
            ->get();

        return DoctorResource::collection($doctors);
    }
}
