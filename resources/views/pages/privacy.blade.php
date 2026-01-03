@extends('layouts.app')

@section('title', 'Kebijakan Privasi')

@section('content')
<div class="relative min-h-screen bg-slate-50 dark:bg-gray-950 overflow-hidden pt-32 pb-20">
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-400/10 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-10 shadow-2xl">
            <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter mb-8 border-b border-slate-100 dark:border-gray-800 pb-6">
                Kebijakan <span class="text-blue-600">Privasi</span>
            </h1>
            
            <div class="prose prose-slate dark:prose-invert max-w-none space-y-8">
                <section>
                    <h3 class="text-lg font-black text-slate-800 dark:text-white flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/40 text-blue-600 flex items-center justify-center text-xs">01</span>
                        Data yang Kami Kumpulkan
                    </h3>
                    <p class="text-slate-600 dark:text-gray-400 leading-relaxed pl-11">
                        Kami mengumpulkan informasi identitas seperti Nama, Email, dan Nomor Telepon untuk keperluan pemrosesan pesanan layanan IT Anda.
                    </p>
                </section>

                <section>
                    <h3 class="text-lg font-black text-slate-800 dark:text-white flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-indigo-100 dark:bg-indigo-900/40 text-indigo-600 flex items-center justify-center text-xs">02</span>
                        Keamanan Informasi
                    </h3>
                    <p class="text-slate-600 dark:text-gray-400 leading-relaxed pl-11">
                        Data Anda dienkripsi secara aman dan tidak akan pernah dibagikan kepada pihak ketiga tanpa izin eksplisit dari Anda.
                    </p>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection