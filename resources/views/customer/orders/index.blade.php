@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-24">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Daftar Pesanan Saya</h1>
        <p class="text-gray-600 dark:text-gray-400">Pantau status perbaikan dan layanan IT Anda.</p>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 dark:bg-gray-700 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">ID Order</th>
                    <th class="px-6 py-4">Layanan</th>
                    <th class="px-6 py-4">Harga</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($orders as $order)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                    <td class="px-6 py-4 font-bold text-blue-600">#{{ $order->id }}</td>
                    <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $order->service->title ?? 'Layanan Terhapus' }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold 
                            {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 
                               ($order->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                            {{ strtoupper($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-box-open text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">Anda belum memiliki pesanan.</p>
                            <a href="{{ route('services.index') }}" class="mt-4 text-blue-600 font-bold hover:underline">Pesan Layanan Sekarang</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</div>
@endsection