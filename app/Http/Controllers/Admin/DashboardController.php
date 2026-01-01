<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. Statistik Utama (tetap sama)
        $stats = [
            'total_services'  => Service::count(),
            'total_orders'    => Order::count(),
            'pending_orders'  => Order::where('status', 'pending')->count(),
            'today_orders'    => Order::whereDate('created_at', now())->count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'total_revenue'   => Order::where('payment_status', 'paid')->sum('total_price') ?? 0,
        ];

        // 2. Logika Filter Pesanan Terbaru
        $query = Order::with(['user', 'service', 'review']); // Tambahkan review di sini

        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $recentOrders = $query->latest()->limit(10)->get();

        $recentCustomers = User::where('role', 'customer')->latest()->limit(5)->get();
        $services = Service::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'recentCustomers', 'services'));
    }
    public function reports()
    {
        $orders = Order::with(['user', 'service'])
                      ->latest()
                      ->paginate(20);

        return view('admin.reports', compact('orders'));
    }
}