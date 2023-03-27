<?php

namespace App\Tasks\ActivityLog;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class GetAllActivityLogsTask
{
    public function run(Request $request)
    {
        return datatables()->of(ActivityLog::ofUser(auth()->user()))
            ->addColumn('created_at', function (ActivityLog $ActivityLog) {
                return $ActivityLog->created_at->format('Y-m-d H:i:s');
            })->addColumn('user', function (ActivityLog $ActivityLog) {
                return optional($ActivityLog->user)->name;
            })
            
            ->make(true);
    }
}
