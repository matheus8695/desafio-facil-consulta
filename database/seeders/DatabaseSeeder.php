<?php

namespace Database\Seeders;

use App\Models\{Appointment, Doctor, Patient, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CitySeeder::class);

        Doctor::factory(20)->create();
        Patient::factory(50)->create();
        Appointment::factory(50)->create();
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
