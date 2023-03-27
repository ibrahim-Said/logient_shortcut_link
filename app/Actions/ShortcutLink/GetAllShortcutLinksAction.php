<?php
namespace App\Actions\ShortcutLink;

use App\Tasks\ShortcutLink\GetAllShortcutLinksTask;
use Illuminate\Http\Request;

class GetAllShortcutLinksAction
{
    public function run(Request $request){
        return app(GetAllShortcutLinksTask::class)->run($request);
    }
}