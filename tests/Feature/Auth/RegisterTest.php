<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }
    public function test_user_cannot_view_a_register_form_when_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/register');
        $response->assertRedirect('/home');
    }
    public function test_user_can_register_with_correct_credentials()
    {
        $user = User::factory()->make();

        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => "password",
            'password_confirmation' => "password",
        ]);

        $response->assertRedirect('/home');
    }
    public function test_user_cannot_register_with_incorrect_password()
    {
        $user = User::factory()->make();
        
        $response = $this->from('/register')->post('/register', [
            'email' => $user->email,
            'name' => $user->name,
            'password' => 'invalid-password',
            'password_confirmation' => 'invalid-password2',
        ]);
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('password');
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
