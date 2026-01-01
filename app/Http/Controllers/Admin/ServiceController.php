<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->paginate(12);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'image' => 'nullable|image|max:2048'
        ]);

        // Proses fitur: Ubah teks per baris dari textarea menjadi array
        if ($request->filled('features')) {
            $validated['features'] = array_filter(explode("\n", str_replace("\r", "", $request->features)));
        } else {
            $validated['features'] = [];
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Layanan berhasil dibuat.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:50',
            'is_active' => 'required|boolean',
            'image' => 'nullable|image|max:2048'
        ]);

        // Proses fitur: Ubah teks per baris menjadi array
        if ($request->filled('features')) {
            $validated['features'] = array_filter(explode("\n", str_replace("\r", "", $request->features)));
        } else {
            $validated['features'] = [];
        }

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        if ($service->orders()->count() > 0) {
            return back()->with('error', 'Layanan tidak bisa dihapus karena memiliki pesanan.');
        }

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Layanan berhasil dihapus.');
    }
}