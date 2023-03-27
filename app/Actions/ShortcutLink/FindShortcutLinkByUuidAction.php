<?php
namespace App\Actions\ShortcutLink;

use App\Tasks\ShortcutLink\FindShortcutLinkByUuidTask;

class FindShortcutLinkByUuidAction
{
    public function run($uuid){
        return app(FindShortcutLinkByUuidTask::class)->run($uuid);
    }
}