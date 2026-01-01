<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'service'])->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'service', 'review']);
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load(['user', 'service']);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
            'payment_status' => 'required|in:pending,paid,failed',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.show', $order)
                         ->with('success', 'Order updated successfully.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui ke: ' . strtoupper($request->status));
    }

    public function updatePaymentStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed'
        ]);

        $order->update(['payment_status' => $request->payment_status]);

        return back()->with('success', 'Payment status updated successfully.');
    }

    public function approveCancel(Order $order)
    {
        // Admin menyetujui, maka status jadi 'cancelled'
        $order->update([
            'status' => 'cancelled',
            'admin_notes' => 'Pembatalan disetujui oleh admin pada ' . now()->format('d M Y H:i')
        ]);

        return back()->with('success', 'Permintaan pembatalan pesanan ' . $order->order_code . ' telah disetujui.');
    }

    public function rejectCancel(Order $order)
    {
        // Admin menolak, maka status dikembalikan ke 'pending' atau 'processing'
        $order->update([
            'status' => 'pending', 
            'admin_notes' => 'Permintaan pembatalan ditolak oleh admin.'
        ]);

        return back()->with('info', 'Permintaan pembatalan pesanan ' . $order->order_code . ' telah ditolak.');
    }
}