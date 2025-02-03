<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\JsonResponse;

class AppointmentController extends Controller
{
    public function index(StoreAppointmentRequest $request): JsonResponse
    {
        $appointment = Appointment::create([
            'doctor_id'  => $request->medico_id,
            'patient_id' => $request->paciente_id,
            'date'       => $request->data,
        ]);

        return response()->json($appointment);
    }
}
