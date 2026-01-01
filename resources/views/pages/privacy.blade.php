@extends('layouts.app')

@section('title', 'Kebijakan Privasi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-24">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Kebijakan Privasi</h1>
        
        <div class="prose dark:prose-invert max-w-none">
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                Kebijakan Privasi ini menjelaskan bagaimana TechEase ID mengumpulkan, menggunakan, 
                dan melindungi informasi pribadi Anda saat menggunakan layanan kami.
            </p>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Informasi yang Kami Kumpulkan</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                Kami mengumpulkan informasi berikut ketika Anda menggunakan layanan kami:
            </p>
            <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-6">
                <li>Informasi pribadi (nama, email, telepon, alamat)</li>
                <li>Informasi transaksi dan pembayaran</li>
                <li>Informasi teknis perangkat yang membutuhkan perbaikan</li>
                <li>Riwayat layanan dan permintaan bantuan</li>
            </ul>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Penggunaan Informasi</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                Informasi yang kami kumpulkan digunakan untuk:
            </p>
            <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-6">
                <li>Menyediakan dan mengelola layanan yang Anda minta</li>
                <li>Memproses transaksi dan pembayaran</li>
                <li>Mengirim notifikasi terkait layanan</li>
                <li>Meningkatkan kualitas layanan kami</li>
                <li>Mematuhi kewajiban hukum</li>
            </ul>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Keamanan Data</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6">
                Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang wajar 
                untuk melindungi informasi pribadi Anda dari akses, penggunaan, atau pengungkapan yang tidak sah.
            </p>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Hak Anda</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                Anda memiliki hak untuk:
            </p>
            <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-6">
                <li>Mengakses informasi pribadi Anda</li>
                <li>Memperbaiki informasi yang tidak akurat</li>
                <li>Menghapus informasi pribadi Anda</li>
                <li>Membatasi pemrosesan informasi Anda</li>
                <li>Menerima salinan informasi Anda dalam format yang dapat dibaca</li>
            </ul>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-8 mb-4">Perubahan Kebijakan</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6">
                Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. 
                Perubahan akan diumumkan melalui website kami.
            </p>
            
            <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg mt-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Kontak untuk Pertanyaan Privasi</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Jika Anda memiliki pertanyaan tentang Kebijakan Privasi kami, 
                    silakan hubungi: privacy@techease.id
                </p>
            </div>
        </div>
    </div>
</div>
@endsection