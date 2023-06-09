<?php
namespace App\Tasks\ShortcutLink;

use App\Actions\ShortcutLink\DeleteShortcutLinkAction;
use App\Http\Requests\ShortcutLinkRequest;
use App\Models\ShortcutLink;

class StoreShortcutLinkTask
{
    public function run(ShortcutLinkRequest $request){
        if(ShortcutLink::count()>=20){
            $oldShortcutLink=ShortcutLink::first();
            app(DeleteShortcutLinkAction::class)->run($oldShortcutLink);
        }
        return ShortcutLink::create($request->validated()+['user_id'=>auth()->ID()]);
    }
}