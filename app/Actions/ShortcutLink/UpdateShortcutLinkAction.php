<?php
namespace App\Actions\ShortcutLink;

use App\Http\Requests\ShortcutLinkRequest;
use App\Models\ShortcutLink;
use App\Tasks\ShortcutLink\UpdateShortcutLinkTask;

class UpdateShortcutLinkAction
{
    public function run(ShortcutLinkRequest $request,ShortcutLink $shortcutLink){
        return app(UpdateShortcutLinkTask::class)->run($request,$shortcutLink);
    }
}