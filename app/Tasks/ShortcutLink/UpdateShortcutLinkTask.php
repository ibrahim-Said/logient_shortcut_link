<?php

namespace App\Tasks\ShortcutLink;
use App\Http\Requests\ShortcutLinkRequest;
use App\Models\ShortcutLink;

class UpdateShortcutLinkTask
{
    public function run(ShortcutLinkRequest $request,ShortcutLink $ShortcutLink)
    {
        $ShortcutLink->update($request->validated());
        return $ShortcutLink;
    }
}
