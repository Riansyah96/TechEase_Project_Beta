<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->with('service')->latest()->paginate(10);
        return view('customer.orders.index', compact('orders'));
    }

    public function create(Request $request)
    {
        // Ambil ID dari URL jika ada (misal: ?service_id=1)
        $selectedServiceId = $request->query('service_id');
        
        // Ambil semua layanan untuk dropdown
        $services = Service::where('is_active', true)->get();
        
        // Cari layanan yang dipilih
        $selectedService = Service::find($selectedServiceId);

        return view('customer.orders.create', compact('services', 'selectedService'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'problem_description' => 'required|string|min:10',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required',
            'address' => 'required|string',
            'payment_method' => 'required|in:cash,transfer,qris'
        ]);

        $service = Service::find($request->service_id);

        Order::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'problem_description' => $request->problem_description,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'address' => $request->address,
            'total_price' => $service->price,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'payment_status' => 'pending'
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Pesanan Anda berhasil dibuat!');
    }

    public function show(Order $order)
    {
        // Pastikan hanya pemilik pesanan yang bisa melihat
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Load relasi service agar datanya tersedia
        $order->load('service');

        return view('customer.orders.show', compact('order'));
    }

    public function cancel(Order $order)
    {
        // Pastikan order ini milik customer yang sedang login
        if ($order->user_id !== auth()->id()) {
            return back()->with('error', 'Akses ditolak.');
        }

        // Hanya bisa membatalkan jika status masih 'pending'
        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan yang sudah diproses tidak bisa dibatalkan.');
        }

        $order->update(['status' => 'cancel_pending']); // Status menunggu ACC admin
        
        return back()->with('success', 'Pengajuan pembatalan telah dikirim.');
    }

    public function createReview(Order $order)
    {
        $this->authorize('review', $order);
        
        return view('customer.orders.review', compact('order'));
    }

    public function storeReview(Request $request, Order $order)
    {
        $this->authorize('review', $order);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500'
        ]);

        $order->review()->create([
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment']
        ]);

        return redirect()->route('customer.orders.show', $order)
                         ->with('success', 'Thank you for your review!');
    }

    public function requestCancel(Order $order)
    {
        // Pastikan order milik user yang login
        if ($order->user_id !== auth()->id()) {
            return back()->with('error', 'Akses tidak sah.');
        }

        // Syarat: Hanya bisa batal jika status masih 'pending'
        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan ini tidak dapat dibatalkan karena sudah diproses.');
        }

        // Ubah status menjadi menunggu persetujuan admin
        $order->update(['status' => 'cancel_pending']);

        return back()->with('success', 'Permintaan pembatalan telah dikirim ke Admin.');
    }
}