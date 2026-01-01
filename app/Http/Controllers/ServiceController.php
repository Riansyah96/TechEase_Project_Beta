<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::where('is_active', 1)->paginate(12);
        // Pastikan nama variabel di sini adalah 'services'
        return view('services.index', compact('services')); 
    }

    public function show($id)
    {
        $service = Service::active()->findOrFail($id);
        $relatedServices = Service::where('category', $service->category)
                                  ->where('id', '!=', $service->id)
                                  ->where('is_active', true)
                                  ->limit(3)
                                  ->get();
        
        return view('services.show', compact('service', 'relatedServices'));
    }
}