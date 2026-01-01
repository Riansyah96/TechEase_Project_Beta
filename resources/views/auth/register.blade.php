@extends('layouts.app')

@section('title', 'Daftar - TechEase ID')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-12 px-4 sm:px-6 lg:px-8 pt-24">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center" data-aos="fade-down">
            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                <i class="fas fa-user-plus text-blue-600 mr-2"></i>Buat Akun Baru
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Bergabung dengan TechEase ID untuk solusi IT terbaik
            </p>
        </div>

        <!-- Register Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8" data-aos="fade-up">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-user mr-2 text-blue-500"></i>Nama Lengkap
                    </label>
                    <div class="relative">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" 
                               required autocomplete="name" autofocus
                               class="w-full px-4 py-3 pl-10 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white 
                                      @error('name') border-red-500 @enderror"
                               placeholder="John Doe">
                        <div class="absolute left-3 top-3.5">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                    </label>
                    <div class="relative">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" 
                               required autocomplete="email"
                               class="w-full px-4 py-3 pl-10 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white 
                                      @error('email') border-red-500 @enderror"
                               placeholder="you@example.com">
                        <div class="absolute left-3 top-3.5">
                            <i class="fas fa-envelope text-gray-400"></i>
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
                               required autocomplete="new-password"
                               class="w-full px-4 py-3 pl-10 pr-10 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white 
                                      @error('password') border-red-500 @enderror"
                               placeholder="Minimal 8 karakter">
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

                <!-- Confirm Password -->
                <div>
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input id="password-confirm" type="password" name="password_confirmation" 
                               required autocomplete="new-password"
                               class="w-full px-4 py-3 pl-10 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                               placeholder="Ulangi password Anda">
                        <div class="absolute left-3 top-3.5">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Password Requirements -->
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-shield-alt mr-1 text-blue-500"></i>Persyaratan Password
                    </h4>
                    <ul class="text-xs text-gray-600 dark:text-gray-400 space-y-1">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2 text-xs"></i>
                            Minimal 8 karakter
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2 text-xs"></i>
                            Kombinasi huruf dan angka
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2 text-xs"></i>
                            Disarankan menggunakan simbol
                        </li>
                    </ul>
                </div>

                <!-- Terms Agreement -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-700 dark:text-gray-300">
                            Saya menyetujui 
                            <a href="{{ route('terms') }}" class="text-blue-600 hover:text-blue-500 dark:text-blue-400">
                                Syarat & Ketentuan
                            </a> 
                            dan 
                            <a href="{{ route('privacy') }}" class="text-blue-600 hover:text-blue-500 dark:text-blue-400">
                                Kebijakan Privasi
                            </a>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent 
                                   rounded-lg shadow-sm text-lg font-bold text-white bg-gradient-to-r 
                                   from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 
                                   transition duration-300 transform hover:-translate-y-0.5">
                        <i class="fas fa-user-plus mr-3"></i>Daftar Akun Baru
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
                            Sudah punya akun?
                        </span>
                    </div>
                </div>
            </div>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" 
                   class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 
                          dark:text-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/30 
                          transition duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke akun yang sudah ada
                </a>
            </div>

            <!-- Benefits Info -->
            <div class="mt-6 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                <h4 class="text-sm font-medium text-green-800 dark:text-green-300 mb-2">
                    <i class="fas fa-gift mr-1"></i>Keuntungan Bergabung
                </h4>
                <ul class="text-xs text-green-700 dark:text-green-400 space-y-1">
                    <li class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-xs"></i>
                        Akses ke semua layanan IT
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-xs"></i>
                        Notifikasi status pesanan
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-xs"></i>
                        Riwayat layanan dan invoice
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-xs"></i>
                        Prioritas support 24/7
                    </li>
                </ul>
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
    // Password toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Add toggle buttons to password fields
        const passwordFields = ['password', 'password-confirm'];
        
        passwordFields.forEach(fieldId => {
            const passwordInput = document.getElementById(fieldId);
            if (passwordInput) {
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
            }
        });

        // Real-time password validation
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('password-confirm');
        
        function validatePasswords() {
            if (passwordInput.value && confirmInput.value) {
                if (passwordInput.value !== confirmInput.value) {
                    confirmInput.classList.add('border-red-500');
                    confirmInput.classList.remove('border-gray-300', 'dark:border-gray-600');
                } else {
                    confirmInput.classList.remove('border-red-500');
                    confirmInput.classList.add('border-gray-300', 'dark:border-gray-600');
                }
            }
        }
        
        passwordInput.addEventListener('input', validatePasswords);
        confirmInput.addEventListener('input', validatePasswords);
    });
</script>
@endpush