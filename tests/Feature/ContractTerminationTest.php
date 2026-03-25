<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Collaborator;
use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractTerminationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_terminate_contract()
    {
        $collaborator = Collaborator::factory()->create();

        $contract = Contract::factory()->create([
            'collaborator_id' => $collaborator->id,
            'status' => 'Activo'
        ]);

        $response = $this->post("/collaborators/contracts/{$contract->id}/terminate", [
            'termination_date' => now(),
            'reason' => 'Renuncia'
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('contract_terminations', [
            'contract_id' => $contract->id
        ]);
    }

    public function test_cannot_terminate_finished_contract()
    {
        $collaborator = Collaborator::factory()->create();

        $contract = Contract::factory()->create([
            'collaborator_id' => $collaborator->id,
            'status' => 'Finalizado'
        ]);

        $response = $this->post("/collaborators/contracts/{$contract->id}/terminate", [
            'termination_date' => now(),
            'reason' => 'Prueba'
        ]);

        $response->assertStatus(400);
    }
}