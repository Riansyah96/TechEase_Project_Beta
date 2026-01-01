<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar pelanggan.
     */
    public function index()
    {
        $users = User::where('role', 'customer')
                     ->latest()
                     ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Menampilkan detail pelanggan.
     */
    // public function show(User $user)
    // {
    //     $user->load(['orders.service']);
    //     return view('admin.users.show', compact('user'));
    // }

    /**
     * Menampilkan form edit user.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui data pelanggan.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string|max:500',
            'role'      => 'required|in:admin,customer',
            'is_active' => 'required|boolean'
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    /**
     * Menghapus user.
     */
    public function destroy(User $user)
    {
        if ($user->orders()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus user yang memiliki riwayat pesanan.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'User berhasil dihapus.');
    }

    /**
     * Toggle status aktif/nonaktif.
     */
    public function toggleStatus(User $user)
    {
        $user->update(['is_active' => !$user->is_active]);
        
        $status = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "User berhasil $status.");
    }

    public function show(User $user)
    {
        // Memuat data pesanan dan layanan terkait agar tabel riwayat terisi
        $user->load(['orders.service']);
        
        return view('admin.users.show', compact('user'));
    }
}