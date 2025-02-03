<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'medico_id'   => ['required', 'exists:doctors,id'],
            'paciente_id' => ['required', 'exists:patients,id'],
            'data'        => ['required', Rule::date()->format('Y-m-d H:i:s')],
        ];
    }
}
