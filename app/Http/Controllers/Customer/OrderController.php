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
        $selectedServiceId = $request->query('service_id');
        $services = Service::where('is_active', true)->get();
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
            'total_price' => $service->price,
            'status' => 'pending',
            'problem_description' => $request->problem_description,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Order $order)
    {
        // Proteksi: Pastikan hanya pemilik order yang bisa melihat
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('customer.orders.show', compact('order'));
    }

    /**
     * Menampilkan halaman konfirmasi pembatalan (GET)
     * Sesuai dengan route: customer.orders.cancel
     */
    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return redirect()->route('customer.dashboard')->with('error', 'Akses tidak sah.');
        }

        if ($order->status !== 'pending') {
            return redirect()->route('customer.dashboard')->with('error', 'Pesanan ini tidak dapat dibatalkan.');
        }

        return view('customer.orders.cancel', compact('order'));
    }

    /**
     * Memproses pengajuan pembatalan (POST)
     * Sesuai dengan route: customer.orders.cancel.process
     */
    public function cancelProcess(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return redirect()->route('customer.dashboard')->with('error', 'Akses tidak sah.');
        }

        $request->validate([
            'cancel_reason' => 'required|string|min:10|max:500'
        ]);

        if ($order->status === 'pending') {
            $order->update([
                'status' => 'cancel_pending', // Menunggu persetujuan admin
                'cancel_reason' => $request->cancel_reason
            ]);

            return redirect()->route('customer.dashboard')->with('success', 'Permintaan pembatalan telah dikirim ke Admin.');
        }

        return redirect()->route('customer.dashboard')->with('error', 'Gagal mengajukan pembatalan.');
    }

    // Bagian Review (Jika Anda menggunakan modal di dashboard, rute ini mungkin tidak terpakai, 
    // tapi tetap saya rapikan untuk referensi)
    public function storeReview(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id() || $order->status !== 'completed') {
            return back()->with('error', 'Anda tidak dapat memberi ulasan pada pesanan ini.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500'
        ]);

        $order->review()->create([
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment']
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Terima kasih atas ulasan Anda!');
    }
}