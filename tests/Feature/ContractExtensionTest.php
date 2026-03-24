<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Contract;
use App\Models\Collaborator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractExtensionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_agregar_prorroga_a_contrato_valido()
    {
        $collaborator = Collaborator::factory()->create();

        $contract = Contract::factory()->create([
            'collaborator_id' => $collaborator->id,
            'contract_type' => 'Fijo',
            'status' => 'Activo'
        ]);

        $response = $this->post('/contract-extensions',[
            'contract_id'=>$contract->id,
            'extension_type'=>'Tiempo',
            'new_end_date'=>'2025-12-31'
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('contract_extensions',[
            'contract_id'=>$contract->id
        ]);
    }

    /** @test */
    public function actualiza_fecha_fin_con_prorroga_de_tiempo()
    {
        $contract = Contract::factory()->create([
            'status'=>'Activo'
        ]);

        $this->post('/contract-extensions',[
            'contract_id'=>$contract->id,
            'extension_type'=>'Tiempo',
            'new_end_date'=>'2026-01-01'
        ]);

        $this->assertDatabaseHas('contracts',[
            'id'=>$contract->id,
            'end_date'=>'2026-01-01'
        ]);
    }

    /** @test */
    public function no_permite_prorroga_en_contrato_finalizado()
    {
        $contract = Contract::factory()->create([
            'status'=>'Finalizado'
        ]);

        $response = $this->post('/contract-extensions',[
            'contract_id'=>$contract->id,
            'extension_type'=>'Tiempo',
            'new_end_date'=>'2026-01-01'
        ]);

        $response->assertSessionHasErrors();
    }
}