@extends('layouts.app')

@section('title', 'Account Settings - TechEase ID')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(12px) saturate(160%);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
    .dark .glass-card {
        background: rgba(17, 24, 39, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    @keyframes slow-spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-slow-spin {
        animation: slow-spin 25s linear infinite;
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-gray-950 pb-16 pt-24 overflow-hidden relative">
    
    {{-- Background Decor --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-[5%] left-[10%] w-72 h-72 bg-blue-500/10 blur-[100px] rounded-full"></div>
        <div class="absolute bottom-[5%] right-[10%] w-72 h-72 bg-indigo-500/10 blur-[100px] rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full opacity-[0.02] dark:opacity-[0.04] animate-slow-spin">
            <i class="fas fa-cog text-[500px] text-gray-900 dark:text-white"></i>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10">
        
        {{-- Header Section - More Proportional Size --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4" data-aos="fade-down">
            <div>
                <nav class="flex mb-3">
                    <ol class="flex items-center space-x-2 text-[9px] font-black uppercase tracking-[0.2em] text-slate-500">
                        <li>DASHBOARD</li>
                        <li><i class="fas fa-chevron-right text-[7px] mx-1"></i></li>
                        <li class="text-blue-600">SETTINGS</li>
                    </ol>
                </nav>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tighter italic uppercase leading-none">
                    ACCOUNT <span class="text-blue-600">PROFILE</span>
                </h1>
            </div>
            <a href="{{ route('customer.dashboard') }}" class="px-5 py-2.5 bg-slate-900 text-white dark:bg-gray-800 rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-blue-600 transition shadow-lg border border-transparent dark:border-gray-700">
                ← KEMBALI
            </a>
        </div>

        <div class="grid grid-cols-1 gap-8">
            <div class="glass-card rounded-[2.5rem] p-1 shadow-2xl shadow-blue-500/5" data-aos="fade-up">
                <form method="POST" action="{{ route('profile.update') }}" class="p-6 md:p-10">
                    @csrf
                    @method('PATCH')

                    <div class="flex flex-col md:flex-row gap-10 items-center md:items-start">
                        
                        {{-- Avatar Preview - Adjusted Size --}}
                        <div class="w-full md:w-1/3 flex flex-col items-center">
                            <div class="relative">
                                <div class="w-36 h-36 md:w-40 md:h-40 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2rem] flex items-center justify-center text-6xl text-white font-black shadow-2xl border-4 border-white dark:border-gray-800">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-10 h-10 bg-blue-600 text-white rounded-xl shadow-xl flex items-center justify-center border-2 border-white dark:border-gray-800 cursor-pointer">
                                    <i class="fas fa-camera text-xs"></i>
                                </div>
                            </div>
                            <p class="mt-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">USER ID: #{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</p>
                        </div>

                        {{-- Form Inputs - Proportional Padding & Spacing --}}
                        <div class="w-full md:w-2/3 space-y-6">
                            <div class="flex items-center gap-3">
                                <span class="w-8 h-1 bg-blue-600 rounded-full"></span>
                                <h2 class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-[0.2em]">Data Pribadi</h2>
                            </div>

                            <div class="grid grid-cols-1 gap-5">
                                {{-- Input Nama --}}
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 dark:text-gray-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                                    <div class="relative group">
                                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-blue-400/60 z-10">
                                            <i class="fas fa-user text-xs"></i>
                                        </div>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                            class="block w-full px-4 py-3.5 pl-12 rounded-xl border-2 border-slate-100 dark:border-gray-700 
                                                   bg-white dark:bg-gray-900 
                                                   text-slate-900 dark:text-white 
                                                   placeholder-slate-300 dark:placeholder-gray-600
                                                   focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 dark:focus:border-blue-500
                                                   transition-all duration-300 font-bold shadow-sm outline-none text-sm">
                                    </div>
                                    @error('name') <p class="text-red-500 text-[9px] font-bold uppercase mt-1 ml-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- Input Email --}}
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-500 dark:text-gray-400 uppercase tracking-widest ml-1">Alamat Email</label>
                                    <div class="relative group">
                                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-blue-400/60 z-10">
                                            <i class="fas fa-envelope text-xs"></i>
                                        </div>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                            class="block w-full px-4 py-3.5 pl-12 rounded-xl border-2 border-slate-100 dark:border-gray-700 
                                                   bg-white dark:bg-gray-900 
                                                   text-slate-900 dark:text-white 
                                                   placeholder-slate-300 dark:placeholder-gray-600
                                                   focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 dark:focus:border-blue-500
                                                   transition-all duration-300 font-bold shadow-sm outline-none text-sm">
                                    </div>
                                    @error('email') <p class="text-red-500 text-[9px] font-bold uppercase mt-1 ml-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl font-black uppercase tracking-widest text-[10px] transition-all hover:scale-105 shadow-xl shadow-blue-500/20 flex items-center justify-center gap-2">
                                    SIMPAN PERUBAHAN <i class="fas fa-check text-[10px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8 flex justify-center opacity-40">
            <p class="text-[8px] font-black text-slate-500 uppercase tracking-[0.4em]">TechEase ID • System Configuration</p>
        </div>
    </div>
</div>
@endsection