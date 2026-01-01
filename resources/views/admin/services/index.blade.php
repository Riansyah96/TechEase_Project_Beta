@extends('layouts.app')

@section('title', 'Daftar Layanan)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">Layanan Profesional</h1>
        <p class="text-xl text-gray-600 dark:text-gray-400">Solusi IT terbaik untuk Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($services as $service)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                        <i class="fas fa-tools text-4xl text-gray-400"></i>
                    </div>
                @endif

                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full uppercase">
                            {{ $service->category }}
                        </span>
                        <span class="text-lg font-bold text-blue-600">
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $service->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                        {{ $service->description }}
                    </p>

                    <a href="{{ route('services.show', $service->id) }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition">
                        Detail Layanan
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 dark:text-gray-400 text-lg">Belum ada layanan yang aktif.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $services->links() }}
    </div>
</div>
@endsection