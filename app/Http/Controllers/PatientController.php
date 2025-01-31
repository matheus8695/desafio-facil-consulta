<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientController extends Controller
{
    public function index(int $doctorId): JsonResource
    {
        $scheduledOnly = request()->has('apenas-agendados');

        $patients = Patient::query()
            ->join('appointments', 'appointments.patient_id', '=', 'patients.id')
            ->where('appointments.doctor_id', $doctorId)
            ->when(
                $scheduledOnly,
                fn (Builder $q) => $q->where('appointments.date', '>', Carbon::now())
            )
            ->orderBy('appointments.date')
            ->select('patients.*')
            ->with(['appointments' => function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId);
            }])
            ->get();

        return PatientResource::collection($patients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, int $patientId)
    {
    }
}
