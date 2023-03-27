<?php
namespace App\Actions\ShortcutLink;

use App\Models\ShortcutLink;
use App\Tasks\ShortcutLink\DeleteShortcutLinkTask;

class DeleteShortcutLinkAction
{

    public function run(ShortcutLink $shortcutLink){
        return app(DeleteShortcutLinkTask::class)->run($shortcutLink);
    }
}