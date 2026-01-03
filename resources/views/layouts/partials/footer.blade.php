<footer class="relative bg-gray-950 text-gray-400 py-20 overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 blur-[100px] rounded-full translate-x-1/2 -translate-y-1/2"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            
            <div class="md:col-span-5">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-6 group">
                    <div class="p-2 bg-blue-600 rounded-lg shadow-lg shadow-blue-500/20">
                        <i class="fas fa-laptop-medical text-white"></i>
                    </div>
                    <span class="text-2xl font-black text-white tracking-tighter">TechEase<span class="text-blue-500">.ID</span></span>
                </a>
                <p class="text-lg leading-relaxed max-w-md mb-8">
                    Partner teknologi terpercaya untuk kebutuhan perbaikan IT, maintenance sistem, dan konsultasi perangkat keras/lunak Anda.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-xl border border-gray-800">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-xl border border-gray-800">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-xl border border-gray-800">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="md:col-span-2">
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-6">Navigasi</h4>
                <ul class="space-y-4 text-sm font-bold">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-500 transition">Home</a></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-blue-500 transition">Layanan IT</a></li>
                    {{-- Diarahkan ke rute 'about' --}}
                    <li><a href="{{ route('about') }}" class="hover:text-blue-500 transition">Tentang Kami</a></li>
                </ul>
            </div>

            <div class="md:col-span-2">
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-6">Bantuan</h4>
                <ul class="space-y-4 text-sm font-bold">
                    {{-- Diubah dari pages.contact menjadi contact --}}
                    <li><a href="{{ route('contact') }}" class="hover:text-blue-500 transition">Hubungi Kami</a></li>
                    {{-- Karena rute 'sitemap' tidak ada di web.php, sementara dikosongkan agar tidak error --}}
                    <li><a href="{{ route('sitemap') }}" class="hover:text-blue-500 transition">Pusat Bantuan</a></li>
                    {{-- Diubah dari pages.privacy menjadi privacy --}}
                    <li><a href="{{ route('privacy') }}" class="hover:text-blue-500 transition">Kebijakan Privasi</a></li>
                    {{-- Diubah dari pages.terms menjadi terms --}}
                    <li><a href="{{ route('terms') }}" class="hover:text-blue-500 transition">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div class="md:col-span-3">
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-6">Berlangganan</h4>
                <p class="text-xs mb-4 italic">Dapatkan update teknologi & promo layanan kami.</p>
                <form class="relative group">
                    <input type="email" placeholder="Email Anda" 
                           class="w-full bg-gray-900 border border-gray-800 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-blue-600 focus:border-transparent transition outline-none">
                    <button class="absolute right-2 top-2 p-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-paper-plane text-xs"></i>
                    </button>
                </form>
            </div>

        </div>

        <div class="mt-20 pt-8 border-t border-gray-900 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-xs font-bold">
                &copy; {{ date('Y') }} TechEase ID. Crafted with <i class="fas fa-heart text-red-500 animate-pulse"></i> by TechEase Team.
            </p>
            <div class="flex gap-6 text-[10px] font-black uppercase tracking-widest">
                <span>Secure Payment</span>
                <div class="flex gap-3 grayscale opacity-50">
                    <i class="fab fa-cc-visa text-lg"></i>
                    <i class="fab fa-cc-mastercard text-lg"></i>
                    <i class="fas fa-university text-lg"></i>
                </div>
            </div>
        </div>
    </div>
</footer>