<?php

namespace Tests\Feature\Auth\Passwords;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class ResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_password_reset_page()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        $this->get(route('password.reset', [
            'email' => $user->email,
            'token' => $token,
        ]))
            ->assertSuccessful()
            ->assertSee($user->email)
            ->assertSeeLivewire('auth.passwords.reset');
    }

    public function test_can_reset_password()
    {
        $user = User::factory()->create();

        $token = Str::random(16);

        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        Livewire::test('auth.passwords.reset', [
            'token' => $token,
        ])
            ->set('email', $user->email)
            ->set('password', 'new-password')
            ->set('passwordConfirmation', 'new-password')
            ->call('resetPassword');

        $this->assertTrue(Auth::attempt([
            'email' => $user->email,
            'password' => 'new-password',
        ]));
    }

    public function test_token_is_required()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => null,
        ])
            ->call('resetPassword')
            ->assertHasErrors(['token' => 'required']);
    }

    public function test_email_is_required()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('email', null)
            ->call('resetPassword')
            ->assertHasErrors(['email' => 'required']);
    }

    public function test_email_is_valid_email()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('email', 'email')
            ->call('resetPassword')
            ->assertHasErrors(['email' => 'email']);
    }

    function test_password_is_required()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('password', '')
            ->call('resetPassword')
            ->assertHasErrors(['password' => 'required']);
    }

    function test_password_is_minimum_of_eight_characters()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('password', 'secret')
            ->call('resetPassword')
            ->assertHasErrors(['password' => 'min']);
    }

    function test_password_matches_password_confirmation()
    {
        Livewire::test('auth.passwords.reset', [
            'token' => Str::random(16),
        ])
            ->set('password', 'new-password')
            ->set('passwordConfirmation', 'not-new-password')
            ->call('resetPassword')
            ->assertHasErrors(['password' => 'same']);
    }
}
