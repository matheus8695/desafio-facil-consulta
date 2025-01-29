<?php

namespace Database\Seeders;

use App\Models\{Appointment, Patient, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CitySeeder::class);
        $this->call(DoctorSeeder::class);

        Patient::factory(10)->create();
        Appointment::factory(10)->create();
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
