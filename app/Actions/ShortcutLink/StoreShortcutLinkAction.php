<?php
namespace App\Actions\ShortcutLink;

use App\Http\Requests\ShortcutLinkRequest;
use App\Tasks\ShortcutLink\StoreShortcutLinkTask;

class StoreShortcutLinkAction
{
    public function run(ShortcutLinkRequest $request){
        return app(StoreShortcutLinkTask::class)->run($request);
    }
}