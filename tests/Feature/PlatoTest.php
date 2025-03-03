<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Plato;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlatoTest extends TestCase
{
    use RefreshDatabase; // Limpia la BD en cada prueba

    /** @test */
    public function puede_obtener_todos_los_platos()
    {
        Plato::factory()->count(3)->create(); // Crea 3 platos falsos
        $response = $this->get('/api/platos');
        $response->assertStatus(200)->assertJsonCount(3);
    }

    /** @test */
    public function puede_crear_un_plato()
    {
        $response = $this->postJson('/api/platos', [
            'nombre' => 'Pizza',
            'precio' => 12.50,
            'foto' => UploadedFile::fake()->image('pizza.jpg') // Simula una imagen real
        ]);
        $response->assertStatus(201);
    }

    /** @test */
    public function puede_filtrar_platos_por_precio()
    {
        Plato::factory()->create(['precio' => 10]);
        Plato::factory()->create(['precio' => 50]);

        $response = $this->get('/api/platos?min_precio=20');
        $response->assertStatus(200)->assertJsonCount(1);
    }
}
