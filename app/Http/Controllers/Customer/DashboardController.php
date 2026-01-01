<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard pelanggan dengan statistik dan pesanan terbaru.
     */
    public function index()
    {
        $user = Auth::user();

        $orders = $user->orders()
                   ->with(['service', 'review']) // Tambahkan 'review' di sini
                   ->latest()
                   ->limit(5)
                   ->get();

        // Mengambil statistik untuk ditampilkan di kartu (Stats Cards)
        $stats = [
            'total_orders'     => $user->orders()->count(),
            'pending_orders'   => $user->orders()->where('status', 'pending')->count(),
            'completed_orders' => $user->orders()->where('status', 'completed')->count(),
            'total_reviews'    => $user->reviews()->count(), // Pastikan relasi reviews ada di model User
        ];

        // Mengambil 5 pesanan terbaru beserta relasi layanannya
        // Variabel ini HARUS bernama $orders agar sesuai dengan @forelse($orders as $order) di Blade
        $orders = $user->orders()
                       ->with('service')
                       ->latest()
                       ->limit(5)
                       ->get();

        return view('customer.dashboard', compact('stats', 'orders'));
    }
}