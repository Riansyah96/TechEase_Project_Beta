<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'order_id'   => 'required|unique:reviews,order_id', // Pastikan satu pesanan hanya 1 ulasan
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|string|min:5',
        ]);

        Review::create([
            'user_id'    => auth()->id(),
            'service_id' => $request->service_id,
            'order_id'   => $request->order_id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return back()->with('success', 'Ulasan berhasil disimpan!');
    }
}