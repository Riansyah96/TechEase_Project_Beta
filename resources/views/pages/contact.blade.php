@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Information -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Hubungi Kami</h1>
            
            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                        <i class="fas fa-map-marker-alt text-blue-600 dark:text-blue-400 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Alamat</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Jl. Teknologi No. 123<br>
                            Jakarta, Indonesia
                        </p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="bg-green-100 dark:bg-green-900 p-3 rounded-lg">
                        <i class="fas fa-phone text-green-600 dark:text-green-400 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Telepon</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            +62 812-XXXX-XXXX<br>
                            Senin - Jumat, 08:00 - 17:00 WIB
                        </p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-lg">
                        <i class="fas fa-envelope text-purple-600 dark:text-purple-400 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Email</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            contact@techease.id<br>
                            support@techease.id
                        </p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="bg-orange-100 dark:bg-orange-900 p-3 rounded-lg">
                        <i class="fas fa-clock text-orange-600 dark:text-orange-400 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Jam Operasional</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Senin - Jumat: 08:00 - 17:00 WIB<br>
                            Sabtu: 09:00 - 15:00 WIB<br>
                            Minggu: Libur
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Ikuti Kami</h3>
                <div class="flex space-x-4">
                    <a href="#" class="p-3 bg-blue-600 text-white rounded-full hover:bg-blue-700">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="p-3 bg-pink-600 text-white rounded-full hover:bg-pink-700">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="p-3 bg-blue-400 text-white rounded-full hover:bg-blue-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="p-3 bg-blue-800 text-white rounded-full hover:bg-blue-900">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Kirim Pesan</h2>
            
            <form action="#" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" id="name" name="name" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                               required>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                               required>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Telepon
                        </label>
                        <input type="tel" id="phone" name="phone" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 
                                      rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Subjek
                        </label>
                        <select id="subject" name="subject" 
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 
                                       rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                required>
                            <option value="">Pilih subjek</option>
                            <option value="support">Dukungan Teknis</option>
                            <option value="consultation">Konsultasi</option>
                            <option value="partnership">Kemitraan</option>
                            <option value="feedback">Feedback</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Pesan
                        </label>
                        <textarea id="message" name="message" rows="6" 
                                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 
                                         rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                         bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                  required></textarea>
                    </div>
                    
                    <button type="submit" 
                            class="w-full py-3 px-6 bg-blue-600 text-white font-semibold rounded-lg 
                                   hover:bg-blue-700 transition duration-300">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection