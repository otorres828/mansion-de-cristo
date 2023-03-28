<?php

namespace Tests\Unit;

use App\Http\Livewire\Blog\Teaching;
use App\Models\Teaching as ModelsTeaching;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\TestCase;

class TeachingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_the_teaching_component_correctly()
    {
        // Crear datos de prueba
        ModelsTeaching::factory()->create(['status' => 2, 'category_id' => 1, 'user_id' => 1]);
        ModelsTeaching::factory()->create(['status' => 2, 'category_id' => 2, 'user_id' => 2]);

        // Crear instancia de Teaching
        $component = Livewire::test(Teaching::class);

        // Verificar que la vista contiene los elementos esperados
        $component->assertSee('Categoría 1');
        $component->assertSee('Categoría 2');
        $component->assertSee('Autor 1');
        $component->assertSee('Autor 2');
    }

    /** @test */
    public function it_filters_by_category_correctly()
    {
        // Crear datos de prueba
        ModelsTeaching::factory()->create(['status' => 2, 'category_id' => 1, 'user_id' => 1]);
        ModelsTeaching::factory()->create(['status' => 2, 'category_id' => 2, 'user_id' => 2]);

        // Crear instancia de Teaching
        $component = Livewire::test(Teaching::class);

        // Filtrar por categoría 1
        $component->call('filtro', 1);

        // Verificar que la vista contiene solo elementos de la categoría 1
        $component->assertSee('Categoría 1');
        $component->assertDontSee('Categoría 2');
    }

    /** @test */
    public function it_filters_by_author_correctly()
    {
        // Crear datos de prueba
        ModelsTeaching::factory()->create(['status' => 2, 'category_id' => 1, 'user_id' => 1]);
        ModelsTeaching::factory()->create(['status' => 2, 'category_id' => 2, 'user_id' => 2]);

        // Crear instancia de Teaching
        $component = Livewire::test(Teaching::class);

        // Filtrar por autor 1
        $component->set('autors', 1);

        // Verificar que la vista contiene solo elementos del autor 1
        $component->assertSee('Autor 1');
        $component->assertDontSee('Autor 2');
    }
}
