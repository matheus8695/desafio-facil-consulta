<?php

namespace Database\Factories;

use App\Models\City;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'      => fake()->randomElement([$this->maleName(), $this->femaleName()]),
            'specialty' => fake()->randomElement(['Cardiologista', 'Pediatra', 'Dermatologista']),
            'city_id'   => City::inRandomOrder()->value('id'),
        ];
    }

    public function maleName(): string
    {
        $faker = FakerFactory::create('pt_BR');

        return 'Dr.' . $faker->firstNameMale('male') . ' ' . $this->faker->lastName('male');
    }

    public function femaleName(): string
    {
        $faker = FakerFactory::create('pt_BR');

        return 'Dra.' . $faker->firstName('female') . ' ' . $this->faker->lastName('female');
    }
}
