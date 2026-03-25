<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Collaborator;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


public function definition(): array
{
    return [
        'collaborator_id' => Collaborator::factory(),
        'start_date' => now(),
        'end_date' => now()->addYear(),
        'salary' => $this->faker->numberBetween(1000, 5000),
    ];
}
}
