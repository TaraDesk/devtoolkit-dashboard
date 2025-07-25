<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->authority != 'admin') {
            return redirect('/admin')->with('flash', [
                'type' => 'error',
                'icon' => 'shield-off',
                'title' => 'Access Denied',
                'message' => 'You are not authorized to access this page.'
            ]);
        }

        return $next($request);
    }
}
