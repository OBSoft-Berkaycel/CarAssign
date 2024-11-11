<?php

namespace App\Http\Middleware;

use App\Library\Enums\UserTypes;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Pre-Middleware Action
        $userType = Auth::user()->user_type;
        if ($userType !== UserTypes::ADMIN || $userType !== UserTypes::SUPERADMIN) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}