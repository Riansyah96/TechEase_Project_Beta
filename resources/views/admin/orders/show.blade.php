@extends('layouts.app')

@section('title', 'Order Details - #' . $order->order_code)

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
    .dark .glass-card {
        background: rgba(17, 24, 39, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-gray-950 pb-12 pt-28">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Navigation & Title --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div data-aos="fade-right">
                <a href="{{ route('admin.orders.index') }}" class="text-blue-600 font-bold text-xs uppercase tracking-widest flex items-center mb-2 hover:underline">
                    <i class="fas fa-arrow-left mr-2"></i> Back to All Orders
                </a>
                <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tighter italic uppercase">
                    Order <span class="text-blue-600">Details</span>
                </h1>
            </div>
            <div class="flex gap-2" data-aos="fade-left">
                <span class="px-5 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-sm
                    @if($order->status == 'pending') bg-yellow-100 text-yellow-700 
                    @elseif($order->status == 'processing') bg-blue-100 text-blue-700 
                    @elseif($order->status == 'completed') bg-green-100 text-green-700 
                    @else bg-red-100 text-red-700 @endif">
                    Current Status: {{ $order->status }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column: Info --}}
            <div class="lg:col-span-2 space-y-6" data-aos="fade-up">
                
                {{-- Order Info Card --}}
                <div class="glass-card rounded-[2.5rem] p-8 shadow-xl">
                    <div class="flex justify-between items-start mb-6 border-b border-gray-100 dark:border-gray-800 pb-6">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Order ID</p>
                            <h2 class="text-xl font-black text-blue-600">#{{ $order->order_code }}</h2>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Date Created</p>
                            <p class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Service Information</h3>
                            <div class="bg-blue-50/50 dark:bg-blue-900/10 p-4 rounded-2xl border border-blue-100/50 dark:border-blue-800/50">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $order->service->title }}</p>
                                <p class="text-xs text-gray-500 mt-1 uppercase font-bold">{{ $order->service->category }}</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Problem Description</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 italic leading-relaxed">
                                "{{ $order->problem_description }}"
                            </p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Pickup/Visit Schedule</h3>
                        <div class="flex items-center gap-4 text-gray-700 dark:text-gray-300">
                            <div class="flex items-center gap-2 bg-gray-100 dark:bg-gray-800 px-4 py-2 rounded-xl">
                                <i class="far fa-calendar-alt text-blue-600"></i>
                                <span class="text-xs font-bold">{{ \Carbon\Carbon::parse($order->preferred_date)->format('d F Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2 bg-gray-100 dark:bg-gray-800 px-4 py-2 rounded-xl">
                                <i class="far fa-clock text-blue-600"></i>
                                <span class="text-xs font-bold">{{ $order->preferred_time }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Admin Notes Form --}}
                <div class="glass-card rounded-[2.5rem] p-8 shadow-xl">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4">Admin Internal Notes</h3>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <textarea name="admin_notes" rows="3" class="w-full bg-gray-50 dark:bg-gray-800 border-none rounded-2xl text-sm focus:ring-2 focus:ring-blue-500 mb-4" placeholder="Tambahkan catatan teknis di sini...">{{ $order->admin_notes }}</textarea>
                        
                        <div class="flex items-center justify-between">
                            <select name="status" class="bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded-xl text-xs font-bold">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-blue-700 transition shadow-lg shadow-blue-200 dark:shadow-none">
                                Update Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Right Column: Client & Payment --}}
            <div class="space-y-6" data-aos="fade-left">
                {{-- Client Info --}}
                <div class="glass-card rounded-[2.5rem] p-8 shadow-xl">
                    <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-6">Customer Info</h3>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-black">
                            {{ substr($order->user->name, 0, 2) }}
                        </div>
                        <div>
                            <p class="text-sm font-black text-gray-900 dark:text-white">{{ $order->user->name }}</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tight">{{ $order->user->email }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase mb-1">Shipping Address</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed font-medium">{{ $order->address }}</p>
                        </div>
                    </div>
                </div>

                {{-- Payment Info --}}
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[2.5rem] p-8 shadow-xl text-white">
                    <h3 class="text-xs font-black text-blue-200 uppercase tracking-widest mb-6">Payment Summary</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-blue-100">Method</span>
                            <span class="text-xs font-black uppercase tracking-widest">{{ $order->payment_method }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-blue-100">Status</span>
                            <span class="px-3 py-1 bg-white/20 rounded-lg text-[10px] font-black uppercase tracking-widest">
                                {{ $order->payment_status }}
                            </span>
                        </div>
                        <div class="pt-4 border-t border-white/10 flex justify-between items-end">
                            <span class="text-xs font-bold text-blue-100">Total Price</span>
                            <span class="text-2xl font-black italic tracking-tighter">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection