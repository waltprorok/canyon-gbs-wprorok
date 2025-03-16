<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Livewire\Auth\Login;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_login_page()
    {
        $this->get(route('login'))
            ->assertSuccessful()
            ->assertSeeLivewire(Login::class);
    }

    public function test_is_redirected_if_already_logged_in()
    {
        $user = User::factory()->create();

        $this->be($user);

        $this->get(route('login'))
            ->assertRedirect(route('home'));
    }

    public function test_a_user_can_login()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('authenticate');

        $this->assertAuthenticatedAs($user);
    }

    public function test_is_redirected_to_the_home_page_after_login()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('authenticate')
            ->assertRedirect(route('home'));
    }

    public function test_email_is_required()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test(Login::class)
            ->set('password', 'password')
            ->call('authenticate')
            ->assertHasErrors(['email' => 'required']);
    }

    public function test_email_must_be_valid_email()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test(Login::class)
            ->set('email', 'invalid-email')
            ->set('password', 'password')
            ->call('authenticate')
            ->assertHasErrors(['email' => 'email']);
    }

    public function test_password_is_required()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->call('authenticate')
            ->assertHasErrors(['password' => 'required']);
    }

    public function test_bad_login_attempt_shows_message()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'bad-password')
            ->call('authenticate')
            ->assertHasErrors('email');

        $this->assertFalse(Auth::check());
    }
}
