<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'     => fake()->name(),
            'phone'    => '(43) ' . fake()->numberBetween(111111111, 999999999),
            'document' => fake()->numberBetween(111, 999) . '.' .
                fake()->numberBetween(111, 999) . '.' .
                fake()->numberBetween(111, 999) . '-' .
                fake()->numberBetween(11, 99),
        ];
    }
}
