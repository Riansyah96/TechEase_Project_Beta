@extends('layouts.app')

@section('title', 'Detail User - ' . $user->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8" data-aos="fade-down">
        <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center mb-2">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar User
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Profil Pelanggan</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="space-y-6" data-aos="fade-right">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
                <div class="flex flex-col items-center text-center">
                    <div class="w-24 h-24 bg-gradient-to-tr from-blue-600 to-blue-400 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-lg mb-4">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                    
                    <div class="mt-4 flex gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $user->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase">
                            {{ $user->role }}
                        </span>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-700 space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">No. Telepon</label>
                        <p class="text-gray-900 dark:text-gray-200">{{ $user->phone ?? 'Tidak tersedia' }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Perusahaan</label>
                        <p class="text-gray-900 dark:text-gray-200">{{ $user->company ?? 'Individu' }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Alamat</label>
                        <p class="text-gray-900 dark:text-gray-200 text-sm">{{ $user->address ?? 'Alamat belum diisi' }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">Member Sejak</label>
                        <p class="text-gray-900 dark:text-gray-200 text-sm">{{ $user->created_at->format('d F Y') }}</p>
                    </div>
                </div>
                
                <div class="mt-8">
                    <a href="{{ route('admin.users.edit', $user) }}" class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-white rounded-xl font-bold transition">
                        <i class="fas fa-edit mr-2"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6" data-aos="fade-left">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-700/30">
                    <h3 class="font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-shopping-bag mr-2 text-blue-500"></i> Riwayat Pesanan
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-xs font-bold text-gray-400 uppercase border-b border-gray-100 dark:border-gray-700">
                                <th class="px-6 py-4">ID Pesanan</th>
                                <th class="px-6 py-4">Layanan</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse($user->orders as $order)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40 transition">
                                <td class="px-6 py-4 font-mono text-xs text-blue-600">#{{ $order->id }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $order->service->title }}
                                </td>
                                <td class="px-6 py-4 text-xs font-bold uppercase">
                                    <span class="px-2 py-1 rounded-md 
                                        {{ $order->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                                        {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                        {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-700' : '' }}
                                        {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                                    ">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900 dark:text-white">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                    User ini belum pernah melakukan pemesanan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection