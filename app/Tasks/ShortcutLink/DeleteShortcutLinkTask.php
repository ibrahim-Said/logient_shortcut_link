<?php

namespace App\Tasks\ShortcutLink;

use App\Models\ShortcutLink;

class DeleteShortcutLinkTask
{
    public function run(ShortcutLink $ShortcutLink)
    {
        try{
            return $ShortcutLink->delete();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
