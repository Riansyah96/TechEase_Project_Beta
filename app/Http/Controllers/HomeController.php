<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->limit(6)->get();
        $reviews = Review::with('user')->latest()->limit(3)->get();
        
        return view('home', compact('services', 'reviews'));
    }

    public function services()
    {
        $services = Service::active()->paginate(9);
        return view('services.index', compact('services'));
    }

    public function showService($id)
    {
        $service = Service::findOrFail($id);
        $relatedServices = Service::where('category', $service->category)
                                  ->where('id', '!=', $service->id)
                                  ->where('is_active', true)
                                  ->limit(3)
                                  ->get();
        
        return view('services.show', compact('service', 'relatedServices'));
    }
}