<?php

namespace Tests\Feature\Locale;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityLogTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_activity_logs()
    {
        $user=User::factory()->create();
        $response = $this->actingAs($user)->get(route('shortcut-links.index'));
        $this->assertEquals(route('shortcut-links.index'),$this->getLastActivityLog()->url);
        $this->assertEquals(request()->ip(),$this->getLastActivityLog()->ip);
    }
    private function getLastActivityLog(){
        return ActivityLog::latest()->first();
    }
    
}
