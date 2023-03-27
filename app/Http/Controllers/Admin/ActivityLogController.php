<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ActivityLog\GetAllActivityLogsAction;
use App\Http\Controllers\Controller;
use App\ViewModels\ActivityLogs\ActivityLogViewModel;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','activityLog']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new ActivityLogViewModel())->view('admin.activity-logs.index');
    }
    public function getAll(Request $request)
    {
        return  app(GetAllActivityLogsAction::class)->run($request);
    }
}
