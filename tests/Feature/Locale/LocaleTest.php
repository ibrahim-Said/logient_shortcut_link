<?php

namespace Tests\Feature\Locale;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_cant_set_locale_when_not_authenticated()
    {
        $response = $this->get(route('locale.set',['locale'=>'fr']));
        $response->assertRedirect('/login');
    }
    public function test_user_can_set_locale_when_authenticated()
    {
        $user=User::factory()->create();
        $response = $this->actingAs($user)->get(route('locale.set',['locale'=>'en']));
        $response->assertRedirect('/');
        $this->assertEquals('en',session()->get('locale'));
    }
    
}
