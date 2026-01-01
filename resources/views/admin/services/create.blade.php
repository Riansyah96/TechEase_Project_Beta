@extends('layouts.app')

@section('title', 'Tambah Layanan Baru')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8" data-aos="fade-down">
        <a href="{{ route('admin.services.index') }}" class="group text-blue-600 hover:text-blue-800 text-sm font-medium transition flex items-center mb-2">
            <i class="fas fa-arrow-left mr-2 transition-transform group-hover:-translate-x-1"></i> 
            Kembali ke Daftar Layanan
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Tambah Layanan Baru</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1">Lengkapi informasi di bawah untuk menambahkan jenis jasa baru ke sistem.</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden" data-aos="fade-up">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="p-6 lg:p-8 space-y-8">
            @csrf

            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-500"></i> Informasi Utama
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nama Layanan</label>
                        <input type="text" name="title" placeholder="Misal: Instalasi Windows 11" 
                            class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Kategori</label>
                        <input type="text" name="category" placeholder="Contoh: Software, Hardware" 
                            class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Harga (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 font-medium">Rp</span>
                            <input type="number" name="price" placeholder="0" 
                                class="w-full pl-12 rounded-xl border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Estimasi Durasi</label>
                        <input type="text" name="duration" placeholder="Contoh: 1-2 Jam" 
                            class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Status Visibilitas</label>
                        <select name="is_active" class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 transition">
                            <option value="1">Aktif (Tampilkan di Website)</option>
                            <option value="0">Draft (Sembunyikan)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                    <i class="fas fa-align-left mr-2 text-blue-500"></i> Detail & Media
                </h3>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Deskripsi Layanan</label>
                        <textarea name="description" rows="4" placeholder="Jelaskan secara detail mengenai layanan ini..." 
                            class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 transition" required></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                            Fitur Utama (Satu per baris)
                        </label>
                        <textarea name="features" rows="3" placeholder="Contoh:&#10;Gratis Konsultasi&#10;Bergaransi 7 Hari" 
                            class="w-full rounded-xl border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 transition"></textarea>
                        <p class="text-xs text-gray-400 mt-2 italic">*Fitur akan ditampilkan sebagai list poin di halaman detail.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 text-blue-600">Unggah Gambar Produk</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-xl hover:border-blue-400 transition cursor-pointer">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-image text-gray-400 text-3xl mb-2"></i>
                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                    <label class="relative cursor-pointer bg-transparent rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                        <span>Klik untuk upload</span>
                                        <input type="file" name="image" class="sr-only" onchange="previewImage(event)">
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                            </div>
                        </div>
                        <img id="img-preview" class="mt-4 hidden h-32 rounded-lg border dark:border-gray-600 shadow-sm">
                    </div>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-extrabold py-4 rounded-xl transition duration-300 shadow-lg transform hover:-translate-y-1 active:scale-95 flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i> Simpan Layanan Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('img-preview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endpush
@endsection