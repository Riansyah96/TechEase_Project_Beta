@extends('layouts.app')

@section('title', 'Syarat & Ketentuan')

@section('content')
<div class="relative min-h-screen bg-slate-50 dark:bg-gray-950 overflow-hidden pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-10 shadow-2xl">
            <h1 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter mb-8 border-b border-slate-100 dark:border-gray-800 pb-6">
                Syarat & <span class="text-blue-600">Ketentuan</span>
            </h1>
            
            <div class="prose prose-slate dark:prose-invert max-w-none space-y-8">
                <div class="bg-orange-50/50 dark:bg-orange-900/10 border-l-4 border-orange-500 p-6 rounded-r-2xl mb-10">
                    <p class="text-orange-800 dark:text-orange-300 font-bold italic text-sm m-0">
                        Harap baca dokumen ini dengan seksama sebelum menggunakan layanan kami.
                    </p>
                </div>

                <div class="space-y-6">
                    <section>
                        <h3 class="text-lg font-black text-slate-800 dark:text-white mb-3">1. Penggunaan Layanan</h3>
                        <p class="text-slate-600 dark:text-gray-400 leading-relaxed">
                            Setiap pengguna wajib memberikan informasi alamat dan kendala perangkat yang akurat demi kelancaran servis teknisi kami di lapangan.
                        </p>
                    </section>

                    <section>
                        <h3 class="text-lg font-black text-slate-800 dark:text-white mb-3">2. Kebijakan Garansi</h3>
                        <p class="text-slate-600 dark:text-gray-400 leading-relaxed">
                            Masa garansi bervariasi tergantung pada jenis layanan dan komponen yang diganti. Kerusakan akibat kelalaian pengguna setelah servis tidak ditanggung garansi.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection