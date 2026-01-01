@extends('layouts.app')

@section('title', 'Manage All Orders - TechEase Control')

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

    /* Custom Status Dropdown Appearance */
    .status-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }

    /* HIDE SCROLLBAR UTILITY */
    /* Untuk Chrome, Safari dan Opera */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    /* Untuk IE, Edge dan Firefox */
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-gray-950 pb-12 pt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8 gap-4">
            <div data-aos="fade-right">
                <h1 class="text-4xl font-black text-gray-900 dark:text-white tracking-tighter italic">
                    All <span class="text-blue-600">Orders</span>
                </h1>
                <p class="text-gray-500 dark:text-gray-400 font-bold text-sm uppercase tracking-widest mt-2">
                    Total: {{ $orders->total() }} Pesanan Tercatat
                </p>
            </div>
            <div class="flex gap-3" data-aos="fade-left">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-gray-50 dark:hover:bg-gray-800 transition shadow-sm flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Dashboard
                </a>
            </div>
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
        <div class="mb-6 p-4 glass-card border-l-4 border-green-500 rounded-2xl flex items-center gap-3 shadow-lg" data-aos="zoom-in">
            <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-check text-xs"></i>
            </div>
            <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ session('success') }}</span>
        </div>
        @endif

        {{-- Main Table Container --}}
        <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] border border-gray-100 dark:border-gray-800 shadow-xl overflow-hidden" data-aos="fade-up">
            
            {{-- Wrapper dengan class no-scrollbar --}}
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left min-w-[800px]">
                    <thead>
                        <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 border-b border-gray-50 dark:border-gray-800">
                            <th class="px-8 py-6">Order ID & Date</th>
                            <th class="px-8 py-6">Client</th>
                            <th class="px-8 py-6">Service</th>
                            <th class="px-8 py-6">Live Status</th>
                            <th class="px-8 py-6 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                        @forelse($orders as $order)
                        <tr class="hover:bg-blue-50/30 dark:hover:bg-blue-900/10 transition-colors group">
                            <td class="px-8 py-5">
                                <p class="text-xs font-black text-blue-600 uppercase tracking-tighter">#{{ $order->order_code }}</p>
                                <p class="text-[10px] text-gray-400 font-bold mt-1">
                                    <i class="far fa-clock mr-1"></i>{{ $order->created_at->format('d M Y, H:i') }}
                                </p>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 flex items-center justify-center text-[11px] font-black text-gray-500 uppercase">
                                        {{ substr($order->user->name, 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $order->user->name }}</p>
                                        <p class="text-[10px] text-gray-400">{{ $order->user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-xs font-bold text-gray-700 dark:text-gray-300">
                                    {{ $order->service->title ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" 
                                        class="status-select text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-xl border-none focus:ring-2 focus:ring-blue-500 cursor-pointer transition-all
                                        @if($order->status == 'pending') bg-yellow-100 text-yellow-700 
                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-700 
                                        @elseif($order->status == 'completed') bg-green-100 text-green-700 
                                        @else bg-red-100 text-red-700 @endif">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-flex items-center justify-center px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-xl text-[10px] font-black uppercase tracking-widest text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white transition-all transform group-hover:scale-105">
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-24 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-50 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-box-open text-2xl text-gray-300"></i>
                                    </div>
                                    <p class="text-gray-400 font-bold italic">Belum ada data pesanan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination Section --}}
            <div class="px-8 py-6 bg-gray-50/50 dark:bg-gray-800/50 border-t border-gray-50 dark:border-gray-800">
                {{ $orders->links() }}
            </div>
        </div>

        {{-- Tip Footer --}}
        <div class="mt-8 text-center" data-aos="fade-up">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">
                <i class="fas fa-info-circle mr-2 text-blue-500"></i> Status updates will notify the customer automatically
            </p>
        </div>
    </div>
</div>
@endsection