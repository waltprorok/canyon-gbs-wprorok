<?php

namespace Tests\Feature;

use App\Filament\Pages\Advisors;
use App\Models\Advisor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AdvisorTest extends TestCase
{
    use RefreshDatabase;

    public mixed $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@domain.com'
        ]);
    }

    public function test_the_advisors_component_can_render()
    {
        $component = Livewire::test(Advisors::class);

        $component->assertStatus(200);
    }

    public function test_can_create_advisor()
    {
        $this->actingAs($this->user);

        $factory = Advisor::factory()->create();

        $advisor = Advisor::first();

        $this->assertEquals($factory->name, $advisor->name);
        $this->assertEquals($factory->email, $advisor->email);
    }
}
