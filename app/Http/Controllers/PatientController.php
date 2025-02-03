<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StorePatientRequest, UpdatePatientRequest};
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
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
            ->with(['appointments' => function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId);
            }])
            ->when(
                request()->has('nome'),
                fn (Builder $q) => $q->where('patients.name', 'like', '%' . request('nome') . '%')
            )
            ->select('patients.*')
            ->orderBy('appointments.date')
            ->get();

        return PatientResource::collection($patients);
    }

    public function store(StorePatientRequest $request): JsonResponse
    {
        $patient = Patient::query()->create([
            'name'     => $request->nome,
            'phone'    => $request->telefone,
            'document' => $request->cpf,
        ]);

        return response()->json($patient);
    }

    public function update(UpdatePatientRequest $request, Patient $patient): JsonResponse
    {
        $patient->update([
            'name'  => $request->nome,
            'phone' => $request->telefone,
        ]);

        return response()->json($patient);
    }
}
