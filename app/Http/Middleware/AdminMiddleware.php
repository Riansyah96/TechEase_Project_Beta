<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        if (Auth::user()->role !== 'admin') {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized access. Admin area only.',
                    'redirect' => url('/')
                ], 403);
            }
            
            return redirect('/')->with('error', 'Unauthorized access. Admin area only.');
        }

        return $next($request);
    }
}