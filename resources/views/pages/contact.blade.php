@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="relative min-h-screen bg-slate-50 dark:bg-gray-950 overflow-hidden pt-32 pb-20">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none">
        <div class="absolute top-[20%] right-[-10%] w-[40%] h-[40%] bg-blue-400/20 blur-[120px] rounded-full animate-pulse"></div>
        <div class="absolute bottom-[20%] left-[-10%] w-[40%] h-[40%] bg-indigo-400/20 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 dark:bg-blue-900/30 border border-blue-100 dark:border-blue-800 text-blue-600 dark:text-blue-400 text-xs font-black uppercase tracking-widest mb-6">
                Hubungi Kami
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter">
                Butuh Bantuan <span class="text-blue-600 dark:text-blue-400">Teknis?</span>
            </h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-600 rounded-xl text-white shadow-lg shadow-blue-500/30">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-black text-slate-900 dark:text-white text-lg">Alamat Kantor</h3>
                            <p class="text-slate-600 dark:text-gray-400 mt-2 italic">Jl. Teknologi No. 123, Jakarta, Indonesia.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-indigo-600 rounded-xl text-white shadow-lg shadow-indigo-500/30">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-black text-slate-900 dark:text-white text-lg">Email Support</h3>
                            <p class="text-slate-600 dark:text-gray-400 mt-2">cs@techease.id</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7">
                <form action="#" class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 md:p-10 shadow-2xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-slate-500 dark:text-gray-400 mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl px-5 py-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-600 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-slate-500 dark:text-gray-400 mb-2">Email</label>
                            <input type="email" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl px-5 py-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-600 outline-none transition-all">
                        </div>
                    </div>
                    <div class="mb-8">
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-500 dark:text-gray-400 mb-2">Pesan Anda</label>
                        <textarea rows="5" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl px-5 py-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-600 outline-none transition-all"></textarea>
                    </div>
                    <button type="submit" class="w-full py-5 bg-blue-600 text-white rounded-2xl font-black shadow-xl hover:bg-blue-700 hover:scale-[1.02] active:scale-95 transition-all">
                        Kirim Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection