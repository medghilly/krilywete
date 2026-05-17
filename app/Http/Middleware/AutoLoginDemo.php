<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoLoginDemo
{
    public function handle(Request $request, Closure $next)
    {
        if (env('DEMO_MODE', false) && !Auth::check()) {
            $demoUser = User::where('email', 'mghilly@email.com')
                ->where('role', 'client')
                ->first();

            if ($demoUser) {
                Auth::login($demoUser);
            }
        }

        return $next($request);
    }
}
