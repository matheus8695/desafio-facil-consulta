<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StorePatientRequest, UpdatePatientRequest};
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Carbon\Carbon;
use Exception;
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
            ->orderBy('appointments.date')
            ->select('patients.*')
            ->with(['appointments' => function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId);
            }])
            ->get();

        return PatientResource::collection($patients);
    }

    public function store(StorePatientRequest $request): JsonResponse|Exception
    {
        try {
            $patient = Patient::query()->create([
                'name'     => $request->nome,
                'phone'    => $request->telefone,
                'document' => $request->cpf,
            ]);

            return response()->json($patient);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(UpdatePatientRequest $request, Patient $patient): JsonResponse|Exception
    {
        try {
            $patient->name  = $request->nome;
            $patient->phone = $request->telefone;

            $patient->update();

            return response()->json($patient);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
