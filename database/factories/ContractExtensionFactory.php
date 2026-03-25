<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contract;

class ContractExtensionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'contract_id' => Contract::factory(),
            'extension_type' => 'Tiempo',
            'new_end_date' => now()->addMonths(3),
            'additional_value' => null,
            'description' => fake()->sentence()
        ];
    }
}
