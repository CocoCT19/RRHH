<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Collaborator;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_colaborador()
    {

        $response = $this->post('/collaborators',[
            'first_name'=>'Luis',
            'last_name'=>'Guerra',
            'document_type'=>'CC',
            'document_number'=>'12345',
            'birth_date'=>'1990-01-01'
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('collaborators',[
            'document_number'=>'12345'
        ]);
    }

    /** @test */
    public function no_permite_documento_duplicado()
    {

        Collaborator::factory()->create([
            'document_number'=>'12345'
        ]);

        $response = $this->post('/collaborators',[
            'first_name'=>'Luis',
            'last_name'=>'Guerra',
            'document_type'=>'CC',
            'document_number'=>'12345',
            'birth_date'=>'1990-01-01'
        ]);

        $response->assertSessionHasErrors();
    }

    /** @test */
    public function puede_actualizar_colaborador()
    {

        $collaborator = Collaborator::factory()->create();

        $response = $this->put("/collaborators/".$collaborator->id,[
            'first_name'=>'Carlos',
            'last_name'=>'Perez'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('collaborators',[
            'first_name'=>'Carlos'
        ]);
    }

    /** @test */
    public function puede_listar_colaboradores()
    {

        Collaborator::factory()->count(3)->create();

        $response = $this->get('/collaborators');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    /** @test */
    public function puede_eliminar_colaborador()
    {

        $collaborator = Collaborator::factory()->create();

        $response = $this->delete("/collaborators/".$collaborator->id);

        $response->assertStatus(200);

        $this->assertSoftDeleted('collaborators',[
            'id'=>$collaborator->id
        ]);
    }
}