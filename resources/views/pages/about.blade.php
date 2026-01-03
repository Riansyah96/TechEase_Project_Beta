@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="relative min-h-screen bg-slate-50 dark:bg-gray-950 overflow-hidden pt-32 pb-20">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-400/20 blur-[120px] rounded-full animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-indigo-400/20 blur-[120px] rounded-full animate-pulse shadow-2xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 dark:bg-blue-900/30 border border-blue-100 dark:border-blue-800 text-blue-600 dark:text-blue-400 text-xs font-black uppercase tracking-widest mb-6">
                Mengenal TechEase
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 dark:text-white tracking-tighter mb-6">
                Solusi IT Tanpa <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-500">Ribet.</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                TechEase ID adalah platform solusi IT yang didedikasikan untuk membantu individu, UMKM, dan kantor kecil mengatasi masalah teknologi dengan mudah, cepat, dan terpercaya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-32">
            <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-10 shadow-2xl shadow-blue-500/5">
                <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-blue-500/30">
                    <i class="fas fa-eye text-xl"></i>
                </div>
                <h2 class="text-2xl font-black text-slate-900 dark:text-white mb-4 tracking-tight">Visi Kami</h2>
                <p class="text-slate-600 dark:text-gray-400 leading-relaxed">
                    Menjadi mitra teknologi terdepan yang membuat solusi IT dapat diakses oleh semua kalangan, tanpa harus khawatir dengan kompleksitas teknis.
                </p>
            </div>
            <div class="bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-10 shadow-2xl shadow-indigo-500/5">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg shadow-indigo-500/30">
                    <i class="fas fa-bullseye text-xl"></i>
                </div>
                <h2 class="text-2xl font-black text-slate-900 dark:text-white mb-4 tracking-tight">Misi Kami</h2>
                <p class="text-slate-600 dark:text-gray-400 leading-relaxed">
                    Memberikan layanan perbaikan dan pemeliharaan IT yang transparan, cepat, dan berkualitas tinggi dengan dukungan teknisi tersertifikasi.
                </p>
            </div>
        </div>

        <section id="team" class="relative">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-100 dark:border-indigo-800 text-indigo-600 dark:text-indigo-400 text-xs font-black uppercase tracking-widest mb-4">
                    Tim Kami
                </div>
                <h2 class="text-3xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter">
                    Expert <span class="text-blue-600">Development</span> Team
                </h2>
                <p class="text-slate-500 dark:text-gray-400 mt-4">Berpengalaman dalam menghadirkan solusi digital yang andal.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="group bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 text-center shadow-xl hover:shadow-blue-500/10 transition-all duration-500">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-blue-600 rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 rounded-2xl overflow-hidden border-2 border-white dark:border-gray-700 shadow-2xl mx-auto">
                            <img src="{{ asset('assets/img/team/anam.jpg') }}" onerror="this.src='https://ui-avatars.com/api/?name=Muhammad+Khoirul+Anam&background=2563EB&color=fff&size=200'" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                    <h5 class="text-xl font-black text-slate-900 dark:text-white mb-1">Muhammad Khoirul Anam</h5>
                    <p class="text-blue-600 dark:text-blue-400 text-xs font-black uppercase tracking-widest mb-4">Project Manager</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400">Pengambil keputusan strategis, koordinasi tim, dan manajemen siklus proyek.</p>
                </div>

                <div class="group bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 text-center shadow-xl hover:shadow-indigo-500/10 transition-all duration-500">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-indigo-600 rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 rounded-2xl overflow-hidden border-2 border-white dark:border-gray-700 shadow-2xl mx-auto">
                            <img src="{{ asset('assets/img/team/arief.jpg') }}" onerror="this.src='https://ui-avatars.com/api/?name=Arief+Rachman&background=4F46E5&color=fff&size=200'" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                    <h5 class="text-xl font-black text-slate-900 dark:text-white mb-1">Arief Rachman Apriansyah</h5>
                    <p class="text-indigo-600 dark:text-indigo-400 text-xs font-black uppercase tracking-widest mb-4">Lead Operations</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400">Manajemen operasional utama dan optimalisasi alur kerja layanan.</p>
                </div>

                <div class="group bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 text-center shadow-xl hover:shadow-blue-500/10 transition-all duration-500">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-blue-600 rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 rounded-2xl overflow-hidden border-2 border-white dark:border-gray-700 shadow-2xl mx-auto">
                            <img src="{{ asset('assets/img/team/nabib.jpg') }}" onerror="this.src='https://ui-avatars.com/api/?name=Nabib+Khalish&background=2563EB&color=fff'" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                    <h5 class="text-xl font-black text-slate-900 dark:text-white mb-1">Nabib Khalish Alfayadh</h5>
                    <p class="text-blue-600 dark:text-blue-400 text-xs font-black uppercase tracking-widest mb-4">Junior Operations</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400">Dukungan operasional lapangan dan monitoring kualitas layanan teknis.</p>
                </div>

                <div class="group bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 text-center shadow-xl hover:shadow-blue-500/10 transition-all duration-500">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-blue-600 rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 rounded-2xl overflow-hidden border-2 border-white dark:border-gray-700 shadow-2xl mx-auto">
                            <img src="{{ asset('assets/img/team/thoriq.jpg') }}" onerror="this.src='https://ui-avatars.com/api/?name=Muhammad+Thoriq&background=2563EB&color=fff'" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                    <h5 class="text-xl font-black text-slate-900 dark:text-white mb-1">Muhammad Thoriq Al-Fath</h5>
                    <p class="text-blue-600 dark:text-blue-400 text-xs font-black uppercase tracking-widest mb-4">Lead Developer</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400">Arsitektur sistem, pengembangan core engine, dan inovasi teknologi.</p>
                </div>

                <div class="group bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 text-center shadow-xl hover:shadow-indigo-500/10 transition-all duration-500">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-indigo-600 rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 rounded-2xl overflow-hidden border-2 border-white dark:border-gray-700 shadow-2xl mx-auto">
                            <img src="{{ asset('assets/img/team/raisa.jpg') }}" onerror="this.src='https://ui-avatars.com/api/?name=M+Raisa+Qisti&background=4F46E5&color=fff&size=200'" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                    <h5 class="text-xl font-black text-slate-900 dark:text-white mb-1">M. Raisa Qisti Raihan</h5>
                    <p class="text-indigo-600 dark:text-indigo-400 text-xs font-black uppercase tracking-widest mb-4">Junior Developer</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400">Pengembangan antarmuka pengguna dan maintenance modul sistem.</p>
                </div>

                <div class="group bg-white/80 dark:bg-gray-900/50 backdrop-blur-xl border border-white dark:border-gray-800 rounded-3xl p-8 text-center shadow-xl hover:shadow-blue-500/10 transition-all duration-500">
                    <div class="relative mb-6 inline-block">
                        <div class="absolute inset-0 bg-blue-600 rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-opacity"></div>
                        <div class="relative w-40 h-40 rounded-2xl overflow-hidden border-2 border-white dark:border-gray-700 shadow-2xl mx-auto">
                            <img src="{{ asset('assets/img/team/ady.jpg') }}" onerror="this.src='https://ui-avatars.com/api/?name=Ady+Eka&background=2563EB&color=fff'" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                    <h5 class="text-xl font-black text-slate-900 dark:text-white mb-1">Ady Eka Apriliansyah</h5>
                    <p class="text-blue-600 dark:text-blue-400 text-xs font-black uppercase tracking-widest mb-4">Security Specialist</p>
                    <p class="text-sm text-slate-500 dark:text-gray-400">Perlindungan data sensitif, audit keamanan, dan pertahanan sistem.</p>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection