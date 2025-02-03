<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerFactory::create('pt_BR');

        return [
            'name'     => $faker->name(),
            'phone'    => $faker->phoneNumber(),
            'document' => $faker->cpf(),
        ];
    }
}
