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

    // Fungsi Baru: Menyetujui Pembatalan
    public function approveCancel(Order $order)
    {
        if ($order->status !== 'cancel_pending') {
            return back()->with('error', 'Pesanan tidak dalam status pengajuan pembatalan.');
        }

        $order->update([
            'status' => 'cancelled',
            // 'payment_status' => 'refundeded' // Opsional jika ada sistem refund
        ]);

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Pembatalan pesanan telah disetujui.');
    }

    // Fungsi Baru: Menolak Pembatalan
    public function rejectCancel(Order $order)
    {
        if ($order->status !== 'cancel_pending') {
            return back()->with('error', 'Pesanan tidak dalam status pengajuan pembatalan.');
        }

        // Kembalikan ke status pending
        $order->update([
            'status' => 'pending',
            'cancel_reason' => null // Opsional: hapus alasan agar bersih kembali
        ]);

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Permintaan pembatalan ditolak. Pesanan kembali ke status Pending.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled,cancel_pending',
            'admin_notes' => 'nullable|string|max:1000', // Validasi notes
        ]);

        $order->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'], // Simpan notes
        ]);

        return back()->with('success', 'Status dan catatan berhasil diperbarui!');
    }
}