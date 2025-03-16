<?php

namespace Tests\Feature;

use App\Filament\Pages\Courses;
use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CourseTest extends TestCase
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

    public function test_the_courses_component_can_render()
    {
        $component = Livewire::test(Courses::class);

        $component->assertStatus(200);
    }

    public function test_can_create_course()
    {
        $this->actingAs($this->user);

        $factory = Course::factory()->create();

        $course = Course::first();

        $this->assertEquals($factory->name, $course->name);
    }
}
