@extends('layouts.app')
@section('title', $service->title . ' - TechEase ID')

@section('content')
<style>
    /* Glassmorphism Effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    .dark .glass-card {
        background: rgba(17, 24, 39, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    /* Animation for the floating price tag */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-gray-950 pb-20 pt-28">
    {{-- Background Decoration --}}
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none overflow-hidden z-0">
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-600/5 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-600/5 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Breadcrumb --}}
        <nav class="flex mb-8" aria-label="Breadcrumb" data-aos="fade-down">
            <ol class="flex items-center space-x-2 text-xs font-black uppercase tracking-[0.2em] text-gray-400">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600 transition">Home</a></li>
                <li><i class="fas fa-chevron-right text-[8px] mx-2"></i></li>
                <li><a href="{{ route('services.index') }}" class="hover:text-blue-600 transition">Layanan</a></li>
                <li><i class="fas fa-chevron-right text-[8px] mx-2"></i></li>
                <li class="text-blue-600">{{ $service->title }}</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            {{-- Main Content (Left Column) --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="glass-card rounded-[3rem] overflow-hidden shadow-2xl shadow-blue-500/5" data-aos="fade-right">
                    {{-- Service Visual Header --}}
                    <div class="relative h-64 md:h-80 bg-gradient-to-br from-blue-600 to-indigo-800 flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
                        </div>
                        <i class="fas fa-microchip text-white/20 text-[15rem] absolute rotate-12"></i>
                        <div class="relative text-center px-6">
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-black text-white uppercase tracking-widest mb-4 inline-block border border-white/30">
                                {{ $service->category }}
                            </span>
                            <h1 class="text-4xl md:text-5xl font-black text-white tracking-tighter italic uppercase leading-none">
                                {{ $service->title }}
                            </h1>
                        </div>
                    </div>

                    {{-- Service Content --}}
                    <div class="p-8 md:p-12">
                        <div class="flex items-center gap-6 mb-8 border-b border-gray-100 dark:border-gray-800 pb-8">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-600">
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Status</p>
                                    <p class="text-xs font-bold text-gray-900 dark:text-white uppercase tracking-tighter">Tersedia Sekarang</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600">
                                    <i class="fas fa-bolt"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">Durasi</p>
                                    <p class="text-xs font-bold text-gray-900 dark:text-white uppercase tracking-tighter">Pengerjaan Cepat</p>
                                </div>
                            </div>
                        </div>

                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            <h3 class="text-xl font-black text-gray-900 dark:text-white uppercase tracking-tight mb-4 flex items-center">
                                <span class="w-8 h-1 bg-blue-600 rounded-full mr-3"></span> Deskripsi Layanan
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed italic font-medium">
                                {{ $service->description }}
                            </p>
                        </div>

                        {{-- Why Choose Us Mini Section --}}
                        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-6 rounded-[2rem] bg-slate-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-800">
                                <i class="fas fa-shield-alt text-blue-600 text-xl mb-4"></i>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2 uppercase text-xs tracking-widest">Garansi Layanan</h4>
                                <p class="text-[11px] text-gray-500 leading-relaxed">Kami memberikan jaminan garansi untuk setiap perbaikan yang dilakukan oleh teknisi kami.</p>
                            </div>
                            <div class="p-6 rounded-[2rem] bg-slate-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-800">
                                <i class="fas fa-user-tie text-blue-600 text-xl mb-4"></i>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2 uppercase text-xs tracking-widest">Teknisi Ahli</h4>
                                <p class="text-[11px] text-gray-500 leading-relaxed">Ditangani oleh profesional yang berpengalaman di bidang IT hardware dan software.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar (Right Column) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-32 space-y-6" data-aos="fade-left">
                    <div class="bg-gray-900 dark:bg-blue-600 rounded-[3rem] p-10 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/10 rounded-full"></div>
                        
                        <h3 class="text-xs font-black uppercase tracking-[0.3em] text-blue-400 dark:text-blue-100 mb-6 flex items-center">
                             Estimasi Biaya
                        </h3>
                        
                        <div class="mb-10 animate-float">
                            <span class="text-4xl md:text-5xl font-black italic tracking-tighter">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </span>
                            <p class="text-blue-200/60 text-[10px] font-bold uppercase mt-2">*Harga belum termasuk komponen pengganti</p>
                        </div>

                        <div class="space-y-4 relative z-10">
                            @auth
                                <a href="{{ route('customer.orders.create', ['service_id' => $service->id]) }}" 
                                   class="block w-full py-5 rounded-2xl bg-white text-blue-600 text-center font-black uppercase tracking-widest hover:bg-gray-100 transition-all hover:scale-105 active:scale-95 shadow-xl">
                                    Pesan Sekarang <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="block w-full py-5 rounded-2xl bg-white text-blue-600 text-center font-black uppercase tracking-widest hover:bg-gray-100 transition-all hover:scale-105 shadow-xl">
                                    Login untuk Pesan
                                </a>
                            @endauth
                            
                            <a href="{{ route('services.index') }}" 
                               class="block w-full py-5 rounded-2xl bg-transparent border-2 border-white/20 text-white text-center font-black uppercase tracking-widest hover:bg-white/10 transition-all text-xs">
                                Lihat Layanan Lain
                            </a>
                        </div>
                    </div>

                    {{-- Help Card --}}
                    <div class="glass-card rounded-[2.5rem] p-8 text-center border-dashed border-2 border-gray-200 dark:border-gray-800">
                        <p class="text-xs font-bold text-gray-500 dark:text-gray-400 mb-4 uppercase tracking-widest">Butuh Bantuan Cepat?</p>
                        <a href="https://wa.me/6281234567890" class="flex items-center justify-center gap-3 text-green-500 hover:text-green-600 transition font-black italic tracking-tighter text-xl">
                            <i class="fab fa-whatsapp"></i> Chat via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection