<?php

namespace Tests\Feature\ShortcutLink;

use App\Models\ShortcutLink;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShortcutLinkTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_be_redirected_to_shortcut_link_when_not_authenticated()
    {
        $shortcutLink = ShortcutLink::factory()->create();
        $response = $this->get('/'.$shortcutLink->uuid);
        $response->assertRedirect($shortcutLink->link);
    }
    public function test_user_cannot_view_a_list_of_shortcutLink_when_not_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->get('/shortcut-links');
        $response->assertRedirect('/login');
    }
    public function test_user_can_view_a_list_of_shortcutLink_when_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/shortcut-links');
        $response->assertSuccessful();
        $response->assertViewIs('admin.shortcut-links.index');
    }
    public function test_user_has_five_shortcut_links_can_t_add_new_shortcutLink()
    {
        $user = User::factory()->create();
        $shortcutLinks = ShortcutLink::factory(5)->create([
            'user_id'=>$user->id
        ]);
        $newShortcutLink = ShortcutLink::factory()->make();
        $response = $this->actingAs($user)->post('/shortcut-links',[
            'link'=>$newShortcutLink->link,
            'name'=>$newShortcutLink->name
        ]);
        $response->assertSessionHasErrors();
    }
    public function test_user_cannot_open_a_create_shortcutLink_form_when_not_authenticated()
    {
        $response = $this->get('/shortcut-links/create');
        $response->assertRedirect('/login');
    }
    public function test_user_can_open_a_create_shortcutLink_form_when_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/shortcut-links/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.shortcut-links.create');
    }
    public function test_user_cant_save_shortcut_link_with_empty_link()
    {
        $user = User::factory()->create();
        $newShortcutLink = ShortcutLink::factory()->make();
        $response = $this->actingAs($user)->post('/shortcut-links',[
            'link'=>null,
            'name'=>$newShortcutLink->name
        ]);
        $response->assertSessionHasErrors('link');
    }
    public function test_user_cant_save_shortcut_link_with_empty_name()
    {
        $user = User::factory()->create();
        $newShortcutLink = ShortcutLink::factory()->make();
        $response = $this->actingAs($user)->post('/shortcut-links',[
            'link'=>$newShortcutLink->link,
            'name'=>null
        ]);
        $response->assertSessionHasErrors(['name']);
    }
    public function test_user_can_store_shortcut_link_with_valid_data()
    {
        $user = User::factory()->create();
        $newShortcutLink = ShortcutLink::factory()->make();
        $response = $this->actingAs($user)->post('/shortcut-links',[
            'link'=>$newShortcutLink->link,
            'name'=>$newShortcutLink->name
        ]);
        $response->assertSessionDoesntHaveErrors();
        $storedShortcutLink=ShortcutLink::latest()->first();
        $this->assertNotEmpty($storedShortcutLink->uuid);
    }

    public function test_user_cant_update_shortcut_link_with_empty_link()
    {
        $user = User::factory()->create();
        $newShortcutLink = ShortcutLink::factory()->create();
        $response = $this->actingAs($user)->put(route('shortcut-links.update',$newShortcutLink->id),[
            'link'=>null,
            'name'=>$newShortcutLink->name
        ]);
        $response->assertSessionHasErrors('link');
    }
    public function test_user_cant_update_shortcut_link_with_empty_name()
    {
        $user = User::factory()->create();
        $newShortcutLink = ShortcutLink::factory()->create();
        $response = $this->actingAs($user)->put(route('shortcut-links.update',$newShortcutLink->id),[
            'link'=>$newShortcutLink->link,
            'name'=>null
        ]);
        $response->assertSessionHasErrors(['name']);
    }
    public function test_user_can_update_shortcut_link_with_valid_data()
    {
        $user = User::factory()->create();
        $newShortcutLink = ShortcutLink::factory()->create();
        $response = $this->actingAs($user)->put(route('shortcut-links.update',$newShortcutLink->id),[
            'link'=>$newShortcutLink->link,
            'name'=>$newShortcutLink->name
        ]);
        $updatedShortcutLink=ShortcutLink::latest()->first();
        $this->assertNotEmpty($updatedShortcutLink->uuid);
        $this->assertEquals($newShortcutLink->link,$updatedShortcutLink->link);
        $response->assertSessionDoesntHaveErrors();
    }
    public function test_user_can_delete_shortcut_link()
    {
        $user = User::factory()->create();
        $newShortcutLink = ShortcutLink::factory()->create();
        $response = $this->actingAs($user)->delete(route('shortcut-links.destroy',$newShortcutLink->id));
        $shortcutLink=ShortcutLink::find($newShortcutLink->id);
        $this->assertEmpty($shortcutLink);
        $response->assertSuccessful();
    }
}
