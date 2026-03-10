<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect('/');
        }

        if (auth()->user()->role !== $role) {
            return redirect('/');
        }

        if (auth()->user()->accept !== 'yes') {
            return redirect('/');
        }

        return $next($request);
    }
}
