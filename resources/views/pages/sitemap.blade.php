@extends('layouts.app')

@section('title', 'Pusat Bantuan')

@section('content')
<div class="relative min-h-screen bg-slate-50 dark:bg-gray-950 overflow-hidden pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-black text-slate-900 dark:text-white tracking-tighter mb-4">Pusat <span class="text-blue-600">Bantuan</span></h1>
            <p class="text-slate-500 dark:text-gray-400">Navigasi cepat untuk menemukan apa yang Anda butuhkan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 hover:scale-[1.02] transition-all duration-300 group">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center text-blue-600 dark:text-blue-400 text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <i class="fas fa-question-circle"></i>
                </div>
                <h3 class="text-xl font-black text-slate-900 dark:text-white mb-4">FAQ Utama</h3>
                <p class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed mb-6">Cari jawaban cepat untuk masalah umum IT Anda secara instan.</p>
                <a href="#" class="text-blue-600 font-bold text-xs uppercase tracking-widest hover:underline">Lihat Semua &rarr;</a>
            </div>

            <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 hover:scale-[1.02] transition-all duration-300 group">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-2xl flex items-center justify-center text-green-600 dark:text-green-400 text-2xl mb-6 group-hover:bg-green-600 group-hover:text-white transition-all">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="text-xl font-black text-slate-900 dark:text-white mb-4">Peta Situs</h3>
                <ul class="space-y-2 text-sm text-slate-600 dark:text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-500 transition">Halaman Utama</a></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-blue-500 transition">Layanan IT</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-500 transition">Tentang Kami</a></li>
                </ul>
            </div>

            <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 hover:scale-[1.02] transition-all duration-300 group border-2 border-transparent hover:border-blue-500/30">
                <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/30 rounded-2xl flex items-center justify-center text-purple-600 dark:text-purple-400 text-2xl mb-6 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="text-xl font-black text-slate-900 dark:text-white mb-4">Dukungan 24/7</h3>
                <p class="text-slate-600 dark:text-gray-400 text-sm mb-6 italic">Butuh bantuan darurat? Hubungi teknisi respon cepat kami sekarang.</p>
                <a href="{{ route('contact') }}" class="inline-block px-6 py-3 bg-slate-900 dark:bg-blue-600 text-white rounded-xl text-xs font-black uppercase tracking-widest">Kontak Support</a>
            </div>
        </div>
    </div>
</div>
@endsection