<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->admin) {
            if ($request->wantsJson()) {
                return response()->json(['Message', 'You do not access to this page.'], 403);
            }
            abort(403, 'You do not access to this page.');
        }
        return $next($request);
    }
}
