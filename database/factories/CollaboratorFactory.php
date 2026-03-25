<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CollaboratorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'document_type' => 'CC',
            'document_number' => fake()->unique()->numerify('########'),
            'birth_date' => fake()->date(),
            'email' => fake()->email(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address()
        ];
    }
}
