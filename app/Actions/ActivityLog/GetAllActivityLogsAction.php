<?php
namespace App\Actions\ActivityLog;

use App\Tasks\ActivityLog\GetAllActivityLogsTask;
use Illuminate\Http\Request;

class GetAllActivityLogsAction
{
    public function run(Request $request){
        return app(GetAllActivityLogsTask::class)->run($request);
    }
}