<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Collaborator;
use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;

    

class ContractTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
 /** @test */
public function puede_crear_contrato()
{
    $collaborator = Collaborator::factory()->create();

    $response = $this->post('/contracts', [
        'collaborator_id' => $collaborator->id,
        'start_date' => '2024-01-01',
        'end_date' => '2024-12-31',
        'salary' => 2000
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('contracts', [
        'collaborator_id' => $collaborator->id
    ]);
}
 /** @test */
public function no_permite_contrato_con_colaborador_inexistente()
{
    $response = $this->post('/contracts', [
        'collaborator_id' => 999,
        'start_date' => '2024-01-01',
        'salary' => 2000
    ]);

    $response->assertSessionHasErrors();
}
 /** @test */
public function valida_salario_correctamente()
{
    $collaborator = Collaborator::factory()->create();

    $response = $this->post('/contracts', [
        'collaborator_id' => $collaborator->id,
        'start_date' => '2024-01-01',
        'salary' => -500
    ]);

    $response->assertSessionHasErrors('salary');
}
 /** @test */
public function puede_actualizar_contrato()
{
    $contract = Contract::factory()->create();

    $response = $this->put("/contracts/{$contract->id}", [
        'start_date' => '2024-02-01',
        'end_date' => '2024-12-31',
        'salary' => 3000
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('contracts', [
        'id' => $contract->id,
        'salary' => 3000
    ]);
}


}
