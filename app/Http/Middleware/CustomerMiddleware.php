<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        if (Auth::user()->role !== 'customer') {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized access. Customer area only.',
                    'redirect' => url('/')
                ], 403);
            }
            
            return redirect('/')->with('error', 'Unauthorized access. Customer area only.');
        }

        return $next($request);
    }
}