<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Locale\SetLocaleAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['activityLog']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setLocale($locale)
    {
        app(SetLocaleAction::class)->run($locale);
        return redirect()->back();
    }

}
