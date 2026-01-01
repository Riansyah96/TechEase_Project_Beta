@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-24">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Tentang TechEase ID</h1>
        
        <div class="prose dark:prose-invert max-w-none">
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                TechEase ID adalah platform solusi IT yang didedikasikan untuk membantu individu, UMKM, 
                dan kantor kecil mengatasi masalah teknologi dengan mudah, cepat, dan terpercaya.
            </p>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Visi Kami</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                Menjadi mitra teknologi terdepan yang membuat solusi IT dapat diakses oleh semua kalangan, 
                tanpa harus khawatir dengan kompleksitas teknis.
            </p>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Misi Kami</h2>
            <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-6">
                <li>Menyediakan layanan IT yang terjangkau dan berkualitas</li>
                <li>Menyederhanakan solusi teknologi dalam bahasa yang mudah dipahami</li>
                <li>Memberikan respon cepat dan pelayanan terbaik</li>
                <li>Membangun ekosistem teknologi yang inklusif</li>
            </ul>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Nilai-Nilai Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-lg">
                    <h3 class="font-bold text-blue-700 dark:text-blue-400 mb-2">Integritas</h3>
                    <p class="text-gray-600 dark:text-gray-300">Kami selalu jujur dan transparan dalam setiap layanan.</p>
                </div>
                <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-lg">
                    <h3 class="font-bold text-green-700 dark:text-green-400 mb-2">Profesionalisme</h3>
                    <p class="text-gray-600 dark:text-gray-300">Tim teknisi kami tersertifikasi dan berpengalaman.</p>
                </div>
                <div class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-lg">
                    <h3 class="font-bold text-purple-700 dark:text-purple-400 mb-2">Inovasi</h3>
                    <p class="text-gray-600 dark:text-gray-300">Selalu mengikuti perkembangan teknologi terbaru.</p>
                </div>
                <div class="bg-orange-50 dark:bg-orange-900/20 p-6 rounded-lg">
                    <h3 class="font-bold text-orange-700 dark:text-orange-400 mb-2">Kepuasan Pelanggan</h3>
                    <p class="text-gray-600 dark:text-gray-300">Prioritas utama kami adalah kepuasan Anda.</p>
                </div>
            </div>
            
            <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg mt-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Hubungi Kami</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    <i class="fas fa-envelope mr-2"></i> Email: contact@techease.id<br>
                    <i class="fas fa-phone mr-2"></i> Telepon: +62 812-XXXX-XXXX<br>
                    <i class="fas fa-clock mr-2"></i> Jam Operasional: Senin - Jumat, 08:00 - 17:00 WIB
                </p>
            </div>
        </div>
    </div>
</div>
@endsection