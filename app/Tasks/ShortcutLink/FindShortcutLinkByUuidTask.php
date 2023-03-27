<?php

namespace App\Tasks\ShortcutLink;

use App\Models\ShortcutLink;

class FindShortcutLinkByUuidTask
{
    public function run($uuid)
    {
        return ShortcutLink::findByUuid($uuid);
    }
}
