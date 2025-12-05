<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_authenticated_user_can_log_out()
    {
        $user = User::factory()->create();
        $this->be($user);

        $this->post(route('logout'))
            ->assertRedirect(route('home'));

        $this->assertFalse(Auth::check());
    }

    public function test_an_unauthenticated_user_can_not_log_out()
    {
        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertFalse(Auth::check());
    }
}
