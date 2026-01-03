<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'service'])->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function approveCancel(Order $order)
    {
        if ($order->status !== 'cancel_pending') {
            return back()->with('error', 'Pesanan tidak dalam status pengajuan pembatalan.');
        }

        $order->update(['status' => 'cancelled']);
        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Pembatalan disetujui.');
    }

    public function rejectCancel(Order $order)
    {
        if ($order->status !== 'cancel_pending') {
            return back()->with('error', 'Pesanan tidak dalam pengajuan pembatalan.');
        }

        $order->update(['status' => 'pending', 'cancel_reason' => null]);
        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Pembatalan ditolak.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled,cancel_pending',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        // PERBAIKAN: Menggunakan $request->input() agar aman jika admin_notes kosong
        $order->update([
            'status' => $request->status,
            'admin_notes' => $request->input('admin_notes'), 
        ]);

        return back()->with('success', 'Data berhasil diperbarui!');
    }
}