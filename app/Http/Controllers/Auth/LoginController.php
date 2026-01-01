<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Get the post login redirect path based on user role.
     *
     * @return string
     */
    protected function redirectTo()
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return route('admin.dashboard');
            } elseif (auth()->user()->role === 'customer') {
                return route('customer.dashboard');
            }
        }
        
        return $this->redirectTo;
    }
}