@extends('layouts.app')

@section('title', 'Dashboard Pelanggan - TechEase ID')

@section('content')
<style>
    /* Menyembunyikan scrollbar tapi tetap bisa di-scroll */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Glassmorphism Effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
    .dark .glass-card {
        background: rgba(17, 24, 39, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Bintang Rating Logic */
    .flex-row-reverse label:hover,
    .flex-row-reverse label:hover ~ label {
        color: #fbbf24 !important;
    }
    input:checked ~ label {
        color: #f59e0b !important;
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-gray-950 pb-12 pt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6" data-aos="fade-down">
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white tracking-tighter uppercase italic">
                    Dashboard <span class="text-blue-600">Pelanggan</span>
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1 font-medium">
                    Selamat datang kembali, {{ Auth::user()->name }}! Pantau progres layanan IT Anda.
                </p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('services.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-600/20 hover:bg-blue-700 transition transform active:scale-95">
                    <i class="fas fa-plus mr-2"></i> Pesan Layanan
                </a>
            </div>
        </div>

        {{-- Statistik Singkat --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="glass-card p-6 rounded-[2rem] shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-2xl flex items-center justify-center text-xl">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Pesanan</p>
                        <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $orders->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="glass-card p-6 rounded-[2rem] shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 rounded-2xl flex items-center justify-center text-xl">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Dalam Proses</p>
                        <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $orders->whereIn('status', ['pending', 'processing', 'cancel_pending'])->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="glass-card p-6 rounded-[2rem] shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 text-green-600 rounded-2xl flex items-center justify-center text-xl">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Selesai</p>
                        <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $orders->where('status', 'completed')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel Pesanan --}}
        <div class="glass-card rounded-[2.5rem] overflow-hidden shadow-2xl" data-aos="fade-up">
            <div class="p-8 border-b border-gray-100 dark:border-gray-800">
                <h2 class="text-lg font-black text-gray-900 dark:text-white uppercase tracking-tight">Riwayat Pesanan</h2>
            </div>
            <div class="overflow-x-auto hide-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 dark:bg-gray-800/50">
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Layanan</th>
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Tanggal</th>
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Total</th>
                            <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @forelse($orders as $order)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/30 transition">
                            <td class="px-8 py-6">
                                <p class="font-black text-gray-900 dark:text-white text-sm uppercase italic">{{ $order->service->title }}</p>
                                <p class="text-xs text-gray-500 font-medium">Order ID: #{{ $order->id }}</p>
                            </td>
                            <td class="px-8 py-6 text-sm font-bold text-gray-600 dark:text-gray-400">
                                {{ $order->created_at->format('d M Y') }}
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                                        'processing' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                        'completed' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                        'cancelled' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                        'cancel_pending' => 'bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400',
                                    ];
                                @endphp
                                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700' }}">
                                    {{ str_replace('_', ' ', $order->status) }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-sm font-black text-blue-600">
                                Rp {{ number_format($order->service->price, 0, ',', '.') }}
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end items-center gap-2">
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('customer.orders.show', $order->id) }}" 
                                       class="px-4 py-2 bg-slate-100 dark:bg-gray-800 text-slate-600 dark:text-gray-400 rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>

                                    {{-- Tombol Review --}}
                                    @if($order->status === 'completed' && !$order->review)
                                        <button onclick="openReviewModal('{{ $order->service->id }}', '{{ $order->id }}', '{{ $order->service->title }}')" 
                                                class="px-4 py-2 bg-yellow-500 text-white rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-yellow-600 transition shadow-lg shadow-yellow-500/20">
                                            <i class="fas fa-star mr-1"></i> Review
                                        </button>
                                    @elseif($order->review)
                                        <span class="text-[9px] font-black text-green-500 uppercase italic tracking-widest px-2">Reviewed ✓</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="opacity-20 mb-4">
                                    <i class="fas fa-box-open text-6xl text-gray-400"></i>
                                </div>
                                <p class="text-gray-500 font-bold italic uppercase tracking-widest text-xs">Belum ada pesanan layanan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Review --}}
<div id="reviewModal" class="fixed inset-0 z-[150] hidden overflow-y-auto" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-slate-950/60 backdrop-blur-md transition-opacity" onclick="closeReviewModal()"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div id="modalContainer" class="inline-block align-middle bg-white dark:bg-gray-900 rounded-[2.5rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full border border-gray-100 dark:border-gray-800 opacity-0 scale-95 duration-300">
            <form action="{{ route('reviews.store') }}" method="POST" class="p-8 md:p-10">
                @csrf
                <input type="hidden" name="service_id" id="modalServiceId">
                <input type="hidden" name="order_id" id="modalOrderId">
                
                <div class="text-center mb-10">
                    <div class="w-16 h-16 bg-yellow-50 dark:bg-yellow-900/20 text-yellow-500 rounded-3xl flex items-center justify-center mx-auto mb-4 text-2xl shadow-inner">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight uppercase italic leading-tight" id="modalTitle">Beri Ulasan</h3>
                    <p class="text-[10px] text-slate-500 dark:text-gray-400 mt-2 font-bold uppercase tracking-widest">Kepuasan Anda adalah prioritas kami</p>
                </div>

                <div class="space-y-8">
                    <div class="text-center">
                        <div class="flex flex-row-reverse justify-center gap-2">
                            @for($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" required onchange="updateRatingLabel({{ $i }})">
                            <label for="star{{ $i }}" class="cursor-pointer text-3xl md:text-4xl text-slate-200 dark:text-gray-700 peer-hover:text-yellow-400 peer-checked:text-yellow-500 transition-all hover:scale-125 active:scale-90">
                                <i class="fas fa-star"></i>
                            </label>
                            @endfor
                        </div>
                        <div class="mt-4 h-6">
                            <span id="ratingLabelText" class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 bg-blue-50 dark:bg-blue-900/30 px-5 py-2 rounded-full">
                                Pilih Bintang
                            </span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Ulasan Singkat</label>
                        <textarea name="comment" rows="3" required
                                  class="w-full px-5 py-4 rounded-2xl border-2 border-slate-100 dark:border-gray-800 
                                         bg-slate-50 dark:bg-gray-950/50 
                                         text-slate-900 dark:text-white 
                                         placeholder-slate-400 dark:placeholder-gray-600
                                         focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600
                                         transition-all duration-300 font-bold shadow-sm outline-none text-sm resize-none"
                                  placeholder="Ceritakan pengalaman Anda..."></textarea>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-2 gap-3">
                    <button type="button" onclick="closeReviewModal()" 
                            class="py-4 bg-slate-100 dark:bg-gray-800 text-slate-500 dark:text-gray-400 rounded-2xl font-black text-[10px] uppercase tracking-widest transition hover:bg-slate-200 dark:hover:bg-gray-700">
                        Nanti
                    </button>
                    <button type="submit" 
                            class="py-4 bg-blue-600 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-blue-600/30 hover:bg-blue-700 transition transform active:scale-95 flex items-center justify-center gap-2">
                        Kirim <i class="fas fa-paper-plane text-[9px]"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateRatingLabel(rating) {
        const labels = { 1: 'Buruk Sekali', 2: 'Kurang Puas', 3: 'Biasa Saja', 4: 'Puas', 5: 'Sangat Puas!' };
        document.getElementById('ratingLabelText').innerText = labels[rating];
    }

    function openReviewModal(serviceId, orderId, serviceTitle) {
        document.getElementById('modalServiceId').value = serviceId;
        document.getElementById('modalOrderId').value = orderId;
        document.getElementById('modalTitle').innerText = serviceTitle;
        const modal = document.getElementById('reviewModal');
        const container = document.getElementById('modalContainer');
        modal.classList.remove('hidden');
        setTimeout(() => {
            container.classList.remove('scale-95', 'opacity-0');
            container.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeReviewModal() {
        const modal = document.getElementById('reviewModal');
        const container = document.getElementById('modalContainer');
        container.classList.remove('scale-100', 'opacity-100');
        container.classList.add('scale-95', 'opacity-0');
        setTimeout(() => { modal.classList.add('hidden'); }, 300);
    }
</script>
@endsection