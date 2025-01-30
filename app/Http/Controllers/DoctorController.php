<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __invoke(Request $request)
    {
        $doctors = Doctor::query()
            ->when($request->has('nome'), function ($query) {
                $query->where('name', 'like', '%' . request('nome') . '%');
            })
            ->orderByRaw("TRIM(BOTH '.' FROM REGEXP_REPLACE(name, '^Dr(a)?\.\s*', ''))")
            ->get();

        return DoctorResource::collection($doctors);
    }
}
