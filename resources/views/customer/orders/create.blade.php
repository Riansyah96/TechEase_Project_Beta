@extends('layouts.app')

@section('title', 'Buat Pesanan Baru')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 pt-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-gray-900 dark:text-white">Formulir Pesanan</h1>
            <p class="text-gray-600 dark:text-gray-400">Silakan lengkapi detail masalah IT Anda di bawah ini.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
            <form action="{{ route('customer.orders.store') }}" method="POST" class="p-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Pilih Layanan</label>
                            <select name="service_id" id="service_id" class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 @error('service_id') border-red-500 @enderror">
                                <option value="">-- Pilih Layanan --</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" 
                                        {{ (old('service_id') ?? ($selectedService->id ?? '')) == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }} ({{ $service->formatted_price }})
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Deskripsi Masalah</label>
                            <textarea name="problem_description" rows="5" placeholder="Contoh: Laptop saya mati total setelah terkena tumpahan air..."
                                class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 @error('problem_description') border-red-500 @enderror">{{ old('problem_description') }}</textarea>
                            @error('problem_description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tanggal Kunjungan</label>
                                <input type="date" name="preferred_date" value="{{ old('preferred_date') }}"
                                    class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 @error('preferred_date') border-red-500 @enderror">
                                @error('preferred_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Waktu</label>
                                <input type="time" name="preferred_time" value="{{ old('preferred_time') }}"
                                    class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 @error('preferred_time') border-red-500 @enderror">
                                @error('preferred_time') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Alamat Lengkap</label>
                            <textarea name="address" rows="3" placeholder="Jl. Merdeka No. 123, Kelurahan..."
                                class="w-full rounded-xl border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address') ?? auth()->user()->address }}</textarea>
                            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Metode Pembayaran</label>
                            <div class="grid grid-cols-3 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="payment_method" value="cash" class="peer hidden" checked>
                                    <div class="text-center p-3 rounded-xl border-2 border-gray-100 dark:border-gray-700 peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 transition">
                                        <i class="fas fa-money-bill-wave mb-1 block"></i>
                                        <span class="text-xs font-bold">Tunai</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="payment_method" value="transfer" class="peer hidden">
                                    <div class="text-center p-3 rounded-xl border-2 border-gray-100 dark:border-gray-700 peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 transition">
                                        <i class="fas fa-university mb-1 block"></i>
                                        <span class="text-xs font-bold">Transfer</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="payment_method" value="qris" class="peer hidden">
                                    <div class="text-center p-3 rounded-xl border-2 border-gray-100 dark:border-gray-700 peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900/20 transition">
                                        <i class="fas fa-qrcode mb-1 block"></i>
                                        <span class="text-xs font-bold">QRIS</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-gray-100 dark:border-gray-700 flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i> Estimasi biaya akan dikonfirmasi kembali oleh teknisi.
                    </div>
                    <div class="flex gap-4 w-full md:w-auto">
                        <a href="{{ route('home') }}" class="flex-1 md:flex-none text-center px-8 py-3 rounded-xl bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-white font-bold hover:bg-gray-200 transition">
                            Batal
                        </a>
                        <button type="submit" class="flex-1 md:flex-none px-12 py-3 rounded-xl bg-blue-600 text-white font-black shadow-lg shadow-blue-500/30 hover:bg-blue-700 transition transform hover:-translate-y-1">
                            Konfirmasi Pesanan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection