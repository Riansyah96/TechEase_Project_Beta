@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 pt-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="{{ route('customer.dashboard') }}" class="text-blue-600 dark:text-blue-400 font-bold hover:underline mb-2 inline-block">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
                </a>
                <h1 class="text-3xl font-black text-gray-900 dark:text-white">Detail Pesanan <span class="text-blue-600">#{{ $order->id }}</span></h1>
            </div>
            <div class="text-right">
                <span class="px-4 py-2 rounded-full text-sm font-black uppercase tracking-widest 
                    {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                       ($order->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700') }}">
                    {{ $order->status }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-tools mr-3 text-blue-600"></i> Informasi Layanan
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between pb-4 border-b border-gray-100 dark:border-gray-700">
                            <span class="text-gray-500">Nama Layanan</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $order->service->title ?? 'Layanan IT' }}</span>
                        </div>
                        <div class="flex justify-between pb-4 border-b border-gray-100 dark:border-gray-700">
                            <span class="text-gray-500">Kategori</span>
                            <span class="font-bold text-blue-600">{{ $order->service->category ?? '-' }}</span>
                        </div>
                        <div class="pt-2">
                            <span class="text-gray-500 block mb-2">Deskripsi Masalah:</span>
                            <p class="text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700/50 p-4 rounded-2xl italic">
                                "{{ $order->problem_description }}"
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-map-marker-alt mr-3 text-red-500"></i> Waktu & Lokasi Kunjungan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Tanggal & Jam</p>
                            <p class="font-bold text-gray-900 dark:text-white">
                                <i class="far fa-calendar-alt mr-2"></i> {{ \Carbon\Carbon::parse($order->preferred_date)->format('d M Y') }}
                                <br>
                                <i class="far fa-clock mr-2"></i> {{ $order->preferred_time }} WIB
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Alamat Kunjungan</p>
                            <p class="font-bold text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{ $order->address }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-8 text-white shadow-xl">
                    <h2 class="text-lg font-bold mb-4">Ringkasan Biaya</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between opacity-80">
                            <span>Biaya Layanan</span>
                            <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between font-black text-xl pt-3 border-t border-white/20">
                            <span>Total</span>
                            <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="mt-6 bg-white/10 rounded-2xl p-4">
                        <p class="text-xs uppercase tracking-widest font-bold opacity-70 mb-1">Metode Pembayaran</p>
                        <p class="font-bold"><i class="fas fa-wallet mr-2"></i> {{ strtoupper($order->payment_method) }}</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-xl border border-gray-100 dark:border-gray-700">
                    <h2 class="font-bold text-gray-900 dark:text-white mb-3">Catatan Teknisi</h2>
                    @if($order->admin_notes)
                        <p class="text-sm text-gray-600 dark:text-gray-400 bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-xl border border-yellow-100 dark:border-yellow-900/30">
                            {{ $order->admin_notes }}
                        </p>
                    @else
                        <p class="text-sm text-gray-400 italic text-center py-4">Belum ada catatan dari teknisi.</p>
                    @endif
                </div>

                @if($order->status == 'pending')
                <form action="{{ route('customer.orders.cancel.process', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                    @csrf
                    <button type="submit" class="w-full py-4 rounded-2xl bg-red-50 text-red-600 font-bold hover:bg-red-100 transition border border-red-100">
                        Batalkan Pesanan
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection