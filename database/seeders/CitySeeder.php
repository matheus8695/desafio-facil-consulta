<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['name' => 'Londrina', 'state' => 'PR'],
            ['name' => 'Florianópolis', 'state' => 'SC'],
            ['name' => 'Porto Alegre', 'state' => 'RS'],
        ];

        foreach ($cities as $city) {
            City::create([
                'name'  => $city['name'],
                'state' => $city['state'],
            ]);
        }
    }
}
