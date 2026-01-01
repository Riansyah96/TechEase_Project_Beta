@extends('layouts.app')

@section('title', 'Katalog Layanan IT Profesional')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-gray-950 py-12 pt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="inline-block px-4 py-2 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-black uppercase tracking-[0.2em] mb-4">
                Our Solutions
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-gray-900 dark:text-white mb-4 tracking-tighter">
                Layanan Profesional <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">TechEase.</span>
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto font-medium">
                Solusi IT end-to-end yang dirancang untuk efisiensi dan keandalan perangkat Anda. Pilih layanan yang sesuai dengan kebutuhan Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($services as $service)
                <div class="group relative bg-white dark:bg-gray-900 rounded-[2.5rem] p-2 border border-gray-100 dark:border-gray-800 hover:border-blue-500/50 transition-all duration-500 shadow-sm hover:shadow-2xl hover:-translate-y-2" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                    
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-8">
                            <div class="w-16 h-16 bg-blue-50 dark:bg-blue-900/20 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-inner">
                                <i class="fas fa-laptop-code text-2xl"></i>
                            </div>
                            <span class="px-4 py-1.5 bg-gray-50 dark:bg-gray-800 text-gray-500 dark:text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-full border border-gray-100 dark:border-gray-700">
                                {{ $service->category }}
                            </span>
                        </div>

                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4 leading-tight group-hover:text-blue-600 transition-colors">
                            {{ $service->title }}
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-8 line-clamp-3">
                            {{ $service->description }}
                        </p>

                        <div class="flex items-center gap-3 mb-8">
                            <div class="text-[10px] font-black text-gray-400 uppercase tracking-tighter leading-none">
                                Estimasi<br>Mulai
                            </div>
                            <div class="text-3xl font-black text-gray-900 dark:text-white tracking-tighter">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="relative overflow-hidden rounded-2xl">
                            <a href="{{ route('services.show', $service->id) }}" 
                               class="relative z-10 block w-full text-center py-4 bg-gray-900 dark:bg-blue-600 text-white font-black hover:bg-blue-700 transition-all duration-300 active:scale-95">
                                Detail & Reservasi
                            </a>
                        </div>
                    </div>

                    <div class="absolute bottom-0 right-0 w-24 h-24 bg-blue-600/5 rounded-tl-[5rem] -z-0 group-hover:bg-blue-600/10 transition-colors"></div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white dark:bg-gray-900 rounded-[3rem] border-2 border-dashed border-gray-100 dark:border-gray-800">
                    <div class="w-20 h-20 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-search text-gray-300 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Layanan tidak ditemukan</h3>
                    <p class="text-gray-500 dark:text-gray-400">Coba gunakan kata kunci lain atau hubungi admin kami.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-20 flex justify-center">
            <div class="inline-flex p-2 bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</div>

<section class="py-20 px-6">
    <div class="max-w-7xl mx-auto bg-gradient-to-r from-blue-600 to-indigo-700 rounded-[3rem] p-10 md:p-16 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden shadow-2xl shadow-blue-500/20">
        <div class="relative z-10 text-center md:text-left">
            <h2 class="text-3xl font-black text-white mb-4">Butuh Layanan Custom?</h2>
            <p class="text-blue-100 font-medium">Konsultasikan masalah IT kompleks Anda dengan tim ahli kami secara gratis.</p>
        </div>
        <a href="https://wa.me/6281234567890" class="relative z-10 px-10 py-4 bg-white text-blue-600 rounded-2xl font-black shadow-xl hover:bg-gray-100 transition-all hover:scale-105 active:scale-95">
            <i class="fab fa-whatsapp mr-2"></i> Chat Sekarang
        </a>
        <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    </div>
</section>
@endsection