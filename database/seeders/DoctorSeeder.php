<?php

namespace Database\Seeders;

use App\Models\{Doctor};
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            ['name' => 'Dr.Roberto', 'specialty' => 'Cardiologista', 'city_id' => 1],
            ['name' => 'Dr.Gustavo', 'specialty' => 'Pediatra', 'city_id' => 2],
            ['name' => 'Dra.Juliana', 'specialty' => 'Dermatologista', 'city_id' => 3],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create([
                'name'      => $doctor['name'],
                'specialty' => $doctor['specialty'],
                'city_id'   => $doctor['city_id'],
            ]);
        }
    }
}
