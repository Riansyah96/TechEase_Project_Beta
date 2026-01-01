@extends('layouts.app')

@section('title', 'Admin Dashboard - TechEase Control')

@section('content')
{{-- Custom CSS untuk menyembunyikan scrollbar dan efek glass --}}
<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    .dark .glass-card {
        background: rgba(17, 24, 39, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
    /* Custom style untuk select agar serasi dengan desain */
    .status-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
</style>

<div class="min-h-screen bg-slate-50 dark:bg-gray-950 pb-12 pt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
            <div data-aos="fade-right">
                <nav class="flex mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 text-xs font-black uppercase tracking-widest">
                        <li class="text-blue-600">Admin</li>
                        <li class="text-gray-400"><i class="fas fa-chevron-right mx-2 text-[8px]"></i></li>
                        <li class="text-gray-400">Control Panel</li>
                    </ol>
                </nav>
                <h1 class="text-4xl font-black text-gray-900 dark:text-white tracking-tighter">
                    System <span class="text-blue-600">Overview</span>
                </h1>
            </div>
            
            <div class="flex items-center gap-4" data-aos="fade-left">
                <div class="text-right hidden sm:block">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Server Status</p>
                    <p class="text-sm font-bold text-green-500 flex items-center justify-end">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span> Operational
                    </p>
                </div>
                <div class="h-10 w-[1px] bg-gray-200 dark:bg-gray-800 hidden sm:block"></div>
                <span class="px-5 py-2.5 bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-2xl text-sm font-bold text-gray-600 dark:text-gray-300 shadow-sm">
                    <i class="fas fa-calendar-alt mr-2 text-blue-600"></i>{{ now()->translatedFormat('d F Y') }}
                </span>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
        <div class="mb-8 p-4 glass-card border-l-4 border-l-green-500 rounded-2xl flex items-center justify-between shadow-lg" data-aos="fade-down">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center shadow-lg shadow-green-500/20">
                    <i class="fas fa-check text-xs"></i>
                </div>
                <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ session('success') }}</span>
            </div>
            <button class="text-gray-400 hover:text-gray-600" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12" data-aos="fade-up">
            {{-- Total Revenue --}}
            <div class="glass-card p-8 rounded-[2.5rem] relative overflow-hidden group transition-all hover:shadow-2xl hover:shadow-blue-500/10">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-600/10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 italic">Total Revenue</p>
                <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-4">
                    Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}
                </h3>
                <div class="flex items-center text-[10px] font-black text-blue-600 uppercase">
                    <i class="fas fa-wallet mr-2"></i> Paid Invoices
                </div>
            </div>

            {{-- Pending Orders --}}
            <div class="glass-card p-8 rounded-[2.5rem] relative overflow-hidden group transition-all hover:shadow-2xl hover:shadow-yellow-500/10">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-yellow-500/10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 italic">Pending Orders</p>
                <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-4">
                    {{ number_format($stats['pending_orders']) }}
                </h3>
                <div class="flex items-center text-[10px] font-black text-yellow-600 uppercase">
                    <i class="fas fa-clock mr-2"></i> Needs Action
                </div>
            </div>

            {{-- Total Customers --}}
            <div class="glass-card p-8 rounded-[2.5rem] relative overflow-hidden group transition-all hover:shadow-2xl hover:shadow-purple-500/10">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-500/10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 italic">Customers</p>
                <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-4">
                    {{ number_format($stats['total_customers']) }}
                </h3>
                <div class="flex items-center text-[10px] font-black text-purple-600 uppercase">
                    <i class="fas fa-users mr-2"></i> Active Clients
                </div>
            </div>

            {{-- Today's Orders --}}
            <div class="glass-card p-8 rounded-[2.5rem] relative overflow-hidden group transition-all hover:shadow-2xl hover:shadow-green-500/10">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-500/10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 italic">Today's Orders</p>
                <h3 class="text-4xl font-black text-gray-900 dark:text-white mb-4">
                    {{ number_format($stats['today_orders']) }}
                </h3>
                <div class="flex items-center text-[10px] font-black text-green-600 uppercase">
                    <i class="fas fa-bolt mr-2"></i> New Today
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Latest Orders Table dengan Fitur Update Status --}}
            <div class="lg:col-span-2 space-y-6" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] border border-gray-100 dark:border-gray-800 shadow-xl overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-50 dark:border-gray-800 flex justify-between items-center">
                        <h2 class="text-lg font-black text-gray-900 dark:text-white italic tracking-tight">Recent Orders</h2>
                        <a href="{{ route('admin.orders.index') }}" class="text-[10px] font-black uppercase text-blue-600 hover:tracking-widest transition-all underline decoration-2 underline-offset-4">View All</a>
                    </div>
                    <div class="overflow-x-auto hide-scrollbar">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 border-b border-gray-50 dark:border-gray-800">
                                    <th class="px-8 py-5">Client</th>
                                    <th class="px-8 py-5">Status Management</th>
                                    <th class="px-8 py-5 text-right">Details</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 dark:divide-gray-800">
                                @forelse($recentOrders as $order)
                                <tr class="hover:bg-blue-50/30 dark:hover:bg-blue-900/10 transition-colors">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 flex items-center justify-center text-gray-500 text-xs font-black">
                                                {{ substr($order->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-900 dark:text-white leading-none">{{ $order->user->name }}</p>
                                                <p class="text-[10px] text-blue-600 font-black mt-1 uppercase">{{ $order->service->title }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        {{-- Inline Update Status Form --}}
                                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" 
                                                class="status-select text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-xl border-none focus:ring-2 focus:ring-blue-500 shadow-sm
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
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-400 hover:bg-blue-600 hover:text-white transition-all">
                                            <i class="fas fa-arrow-right text-[10px]"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-10 text-center text-gray-400 text-sm font-bold italic">No recent orders yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Sidebar Actions --}}
            <div class="space-y-6" data-aos="fade-left" data-aos-delay="200">
                {{-- Quick Actions --}}
                <div class="glass-card p-8 rounded-[2.5rem] shadow-xl border border-white/50">
                    <h2 class="text-sm font-black text-gray-900 dark:text-white uppercase tracking-widest mb-6 italic">Quick Management</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <a href="{{ route('admin.services.create') }}" class="flex items-center p-4 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition transform hover:-translate-y-1 shadow-lg shadow-blue-500/20">
                            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-plus"></i>
                            </div>
                            <span class="font-black text-sm">Add New Service</span>
                        </a>
                        
                        <a href="{{ route('admin.users.index') }}" class="flex items-center p-4 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 text-gray-700 dark:text-gray-200 rounded-2xl hover:border-blue-500 transition transform hover:-translate-y-1 shadow-sm">
                            <div class="w-10 h-10 bg-gray-50 dark:bg-gray-900 rounded-xl flex items-center justify-center mr-4 text-blue-600">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <span class="font-black text-sm">User Directory</span>
                        </a>
                    </div>
                </div>

                {{-- Live Catalog Mini List --}}
                <div class="bg-white dark:bg-gray-900 p-8 rounded-[2.5rem] shadow-xl border border-gray-50 dark:border-gray-800">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-sm font-black text-gray-900 dark:text-white uppercase tracking-widest italic text-opacity-50">Active Catalog</h2>
                        <span class="text-[10px] font-bold text-blue-600 bg-blue-50 dark:bg-blue-900/30 px-2 py-0.5 rounded-lg">{{ $stats['total_services'] }}</span>
                    </div>
                    <div class="space-y-3 max-h-[300px] overflow-y-auto hide-scrollbar">
                        @foreach($services as $service)
                        <div class="flex items-center justify-between p-3 rounded-2xl bg-gray-50 dark:bg-gray-800/50 border border-transparent hover:border-blue-100 dark:hover:border-blue-900 transition-all group">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full {{ $service->is_active ? 'bg-green-500' : 'bg-red-500' }}"></div>
                                <span class="text-xs font-bold text-gray-700 dark:text-gray-300 truncate w-32">{{ $service->title }}</span>
                            </div>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="text-gray-300 group-hover:text-yellow-500 transition-colors">
                                <i class="fas fa-edit text-[10px]"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-50 dark:border-gray-800">
                        <a href="{{ route('admin.services.index') }}" class="block text-center py-3 rounded-xl bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-[10px] font-black uppercase tracking-[0.2em] hover:opacity-80 transition">
                            Manage All Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection