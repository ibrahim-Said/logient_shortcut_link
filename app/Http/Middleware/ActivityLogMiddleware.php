<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class ActivityLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUserInfo = Location::get(request()->ip());
        ActivityLog::create([
            'url' => request()->url(),
            'ip' => request()->ip(),
            'country' => optional($currentUserInfo)->countryName,
            'agent' => request()->header('user-agent'),
            'user_id' => (\Auth::check()) ? auth()->ID() : null
        ]);
        return $next($request);
    }
}
