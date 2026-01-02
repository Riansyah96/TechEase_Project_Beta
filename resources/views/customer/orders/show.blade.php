@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 pt-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Navigation & Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div data-aos="fade-right">
                <a href="{{ route('customer.dashboard') }}" class="text-blue-600 dark:text-blue-400 font-bold hover:underline mb-2 inline-block">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
                </a>
                <h1 class="text-3xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                    Detail Pesanan <span class="text-blue-600">#{{ $order->id }}</span>
                </h1>
            </div>
            <div class="text-right" data-aos="fade-left">
                @php
                    $statusClasses = [
                        'pending' => 'bg-yellow-100 text-yellow-700',
                        'processing' => 'bg-blue-100 text-blue-700',
                        'completed' => 'bg-green-100 text-green-700',
                        'cancelled' => 'bg-red-100 text-red-700',
                        'cancel_pending' => 'bg-orange-100 text-orange-700',
                    ];
                @endphp
                <span class="px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700' }}">
                    {{ str_replace('_', ' ', $order->status) }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Kolom Kiri: Detail Layanan & Lokasi --}}
            <div class="md:col-span-2 space-y-6">
                
                {{-- Informasi Layanan --}}
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-700" data-aos="fade-up">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-tools mr-3 text-blue-600"></i> Informasi Layanan
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between pb-4 border-b border-gray-100 dark:border-gray-700">
                            <span class="text-gray-500 text-sm">Nama Layanan</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $order->service->title ?? 'Layanan IT' }}</span>
                        </div>
                        <div class="flex justify-between pb-4 border-b border-gray-100 dark:border-gray-700">
                            <span class="text-gray-500 text-sm">Kategori</span>
                            <span class="font-bold text-blue-600 uppercase text-xs">{{ $order->service->category ?? '-' }}</span>
                        </div>
                        <div class="pt-2">
                            <span class="text-gray-500 block mb-2 text-sm">Deskripsi Masalah:</span>
                            <p class="text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-2xl italic text-sm leading-relaxed border border-transparent dark:border-gray-600">
                                "{{ $order->problem_description }}"
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Waktu & Lokasi --}}
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-700" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-map-marker-alt mr-3 text-red-500"></i> Waktu & Lokasi Kunjungan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Jadwal Kunjungan</p>
                            <div class="space-y-1">
                                <p class="font-bold text-gray-900 dark:text-white flex items-center">
                                    <i class="far fa-calendar-alt mr-2 text-blue-600"></i> {{ \Carbon\Carbon::parse($order->preferred_date)->format('d M Y') }}
                                </p>
                                <p class="font-bold text-gray-900 dark:text-white flex items-center">
                                    <i class="far fa-clock mr-2 text-blue-600"></i> {{ $order->preferred_time }} WIB
                                </p>
                            </div>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Alamat Lengkap</p>
                            <p class="text-sm font-bold text-gray-700 dark:text-gray-300 leading-relaxed italic">
                                {{ $order->address }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Biaya, Catatan Admin, & Aksi --}}
            <div class="space-y-6">
                
                {{-- Ringkasan Biaya --}}
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-xl" data-aos="fade-left">
                    <h2 class="text-xs font-black uppercase tracking-widest mb-4 opacity-70">Ringkasan Biaya</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between opacity-80 text-sm">
                            <span>Biaya Layanan</span>
                            <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between font-black text-2xl pt-3 border-t border-white/20 tracking-tighter italic">
                            <span>Total</span>
                            <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="mt-6 bg-white/10 rounded-2xl p-4 border border-white/5">
                        <p class="text-[9px] uppercase tracking-[0.2em] font-black opacity-70 mb-1">Metode Pembayaran</p>
                        <p class="font-bold text-sm"><i class="fas fa-wallet mr-2"></i> {{ strtoupper($order->payment_method) }}</p>
                    </div>
                </div>

                {{-- Catatan Teknisi (Admin Notes) --}}
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-xl border border-gray-100 dark:border-gray-700" data-aos="fade-left" data-aos-delay="100">
                    <h2 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4 flex items-center">
                        <i class="fas fa-clipboard-list mr-2 text-blue-500"></i> Catatan Teknisi
                    </h2>
                    @if($order->admin_notes)
                        <div class="relative p-4 rounded-2xl bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800">
                            <i class="fas fa-quote-left absolute top-2 left-2 text-blue-200 dark:text-blue-800 text-xl opacity-50"></i>
                            <p class="text-sm text-gray-700 dark:text-gray-300 font-medium italic leading-relaxed pl-4">
                                {{ $order->admin_notes }}
                            </p>
                        </div>
                    @else
                        <div class="text-center py-6">
                            <div class="w-10 h-10 bg-gray-50 dark:bg-gray-700/50 rounded-full flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-comment-slash text-gray-300"></i>
                            </div>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Belum ada update</p>
                        </div>
                    @endif
                </div>

                {{-- Tombol Batal (Hanya untuk Status Pending) --}}
                @if($order->status == 'pending')
                <div data-aos="zoom-in" data-aos-delay="200">
                    {{-- Diarahkan ke rute konfirmasi GET terlebih dahulu --}}
                    <a href="{{ route('customer.orders.cancel', $order->id) }}" 
                       class="block w-full text-center py-4 rounded-2xl bg-red-50 dark:bg-red-900/10 text-red-600 dark:text-red-400 font-black text-xs uppercase tracking-[0.2em] hover:bg-red-100 dark:hover:bg-red-900/20 transition border-2 border-dashed border-red-200 dark:border-red-900/30 shadow-lg shadow-red-500/5">
                        <i class="fas fa-times-circle mr-2"></i> Ajukan Pembatalan
                    </a>
                </div>
                @endif

                {{-- Info jika sedang menunggu pembatalan --}}
                @if($order->status == 'cancel_pending')
                <div class="p-4 rounded-2xl bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 text-center" data-aos="fade-up">
                    <p class="text-[10px] font-black text-orange-600 dark:text-orange-400 uppercase tracking-widest">
                        <i class="fas fa-hourglass-half mr-1"></i> Menunggu Persetujuan Batal
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection