<?php

namespace Tests\Feature;

use App\Filament\Pages\Students;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class StudentTest extends TestCase
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

    public function test_the_students_component_can_render()
    {
        $component = Livewire::test(Students::class);

        $component->assertStatus(200);
    }

    public function test_can_create_student()
    {
        $this->actingAs($this->user);

        $factory = Student::factory()->create();

        $course = Student::first();

        $this->assertEquals($factory->name, $course->name);
        $this->assertEquals($factory->email, $course->email);
        $this->assertEquals($factory->bio, $course->bio);
        $this->assertEquals($factory->date_of_birth, $course->date_of_birth);
    }
}
