<?php

namespace Database\Factories;

use App\Models\{Doctor, Patient};
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        $doctors  = Doctor::pluck('id')->toArray();
        $patients = Patient::pluck('id')->toArray();

        return [
            'doctor_id'  => fake()->randomElement($doctors),
            'patient_id' => fake()->randomElement($patients),
            'date'       => fake()->dateTimeBetween('-2 months', '+6 months'),
        ];
    }
}
