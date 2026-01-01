@extends('layouts.app')

@section('title', 'Login - TechEase ID')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-12 px-4 sm:px-6 lg:px-8 pt-24">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center" data-aos="fade-down">
            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                <i class="fas fa-laptop-medical text-blue-600 mr-2"></i>TechEase ID
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Masuk ke akun Anda untuk melanjutkan
            </p>
        </div>

        <!-- Login Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8" data-aos="fade-up">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                    </label>
                    <div class="relative">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" 
                               required autocomplete="email" autofocus
                               class="w-full px-4 py-3 pl-10 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white 
                                      @error('email') border-red-500 @enderror"
                               placeholder="you@example.com">
                        <div class="absolute left-3 top-3.5">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>Password
                    </label>
                    <div class="relative">
                        <input id="password" type="password" name="password" 
                               required autocomplete="current-password"
                               class="w-full px-4 py-3 pl-10 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white 
                                      @error('password') border-red-500 @enderror"
                               placeholder="••••••••">
                        <div class="absolute left-3 top-3.5">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                               {{ old('remember') ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                            Ingat saya
                        </label>
                    </div>
                    
                    @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" 
                           class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400">
                            Lupa password?
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent 
                                   rounded-lg shadow-sm text-lg font-bold text-white bg-gradient-to-r 
                                   from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                                   transition duration-300 transform hover:-translate-y-0.5">
                        <i class="fas fa-sign-in-alt mr-3"></i>Masuk ke Akun
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                            Atau
                        </span>
                    </div>
                </div>
            </div>

            <!-- Register Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" 
                       class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 ml-1">
                        Daftar sekarang
                    </a>
                </p>
            </div>

            <!-- Demo Accounts Info -->
            <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                <h4 class="text-sm font-medium text-blue-800 dark:text-blue-300 mb-2">
                    <i class="fas fa-info-circle mr-1"></i>Akun Demo
                </h4>
                <div class="text-xs text-blue-700 dark:text-blue-400 space-y-1">
                    <p><span class="font-semibold">Admin:</span> admin@techease.id / admin123</p>
                    <p><span class="font-semibold">Customer:</span> customer@example.com / password123</p>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke beranda
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Toggle password visibility
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.createElement('button');
        toggleButton.type = 'button';
        toggleButton.className = 'absolute right-3 top-3.5 text-gray-400 hover:text-gray-600';
        toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
        
        const passwordWrapper = passwordInput.parentElement;
        passwordWrapper.appendChild(toggleButton);
        
        toggleButton.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    });
</script>
@endpush