<?php

namespace Database\Factories;

use App\Models\{Doctor, Patient};
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'doctor_id'  => Doctor::inRandomOrder()->value('id'),
            'patient_id' => Patient::inRandomOrder()->value('id'),
            'date'       => fake()->dateTimeBetween('-2 months', '+6 months'),
        ];
    }
}
