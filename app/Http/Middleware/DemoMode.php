<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoMode
{
    public function handle(Request $request, Closure $next)
    {
        if (!env('DEMO_MODE', false)) {
            return $next($request);
        }

        $blockedMethods = ['POST', 'PUT', 'PATCH', 'DELETE'];
        $allowedRoutes = [
            'login',
            'logout',
            'register',
            'admin.login',
            'admin.login.submit',
            'password.email',
            'password.update',
            'car.reservationStore',
        ];

        if (in_array($request->method(), $blockedMethods)
            && !in_array($request->route()?->getName(), $allowedRoutes)) {

            $message = 'Mode démo : les modifications sont désactivées. Code source sur GitHub.';

            if ($request->expectsJson()) {
                return response()->json(['message' => $message], 403);
            }

            return back()->with('demo_notice', $message);
        }

        return $next($request);
    }
}
