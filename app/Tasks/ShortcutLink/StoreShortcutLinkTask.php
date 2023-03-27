<?php
namespace App\Tasks\ShortcutLink;

use App\Http\Requests\ShortcutLinkRequest;
use App\Models\ShortcutLink;

class StoreShortcutLinkTask
{
    public function run(ShortcutLinkRequest $request){
        return ShortcutLink::create($request->validated()+['user_id'=>auth()->ID()]);
    }
}