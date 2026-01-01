@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:underline">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
        <h1 class="text-2xl font-bold mt-2">Edit Layanan: {{ $service->title }}</h1>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Nama Layanan</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $service->category) }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', (int)$service->price) }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Durasi</label>
                    <input type="text" name="duration" value="{{ old('duration', $service->duration) }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Status</label>
                    <select name="is_active" class="w-full rounded-lg border-gray-300 dark:bg-gray-700">
                        <option value="1" {{ $service->is_active ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !$service->is_active ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300 dark:bg-gray-700" required>{{ old('description', $service->description) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Fitur (Satu per baris)</label>
                    <textarea name="features" rows="4" class="w-full rounded-lg border-gray-300 dark:bg-gray-700">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Gambar</label>
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" class="h-20 mb-2 rounded">
                    @endif
                    <input type="file" name="image" class="w-full">
                </div>
            </div>

            <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-3 rounded-lg font-bold">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection