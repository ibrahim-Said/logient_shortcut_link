<?php

namespace App\Listeners;

use App\Models\ShortcutLink;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteExpiredShortcutLink
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle()
    {
        ShortcutLink::where('created_at','<=',Carbon::now()->subDays(1))->delete();
    }
}
